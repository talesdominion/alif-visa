import snapshot from '@/data/posts.snapshot.json';

/**
 * Headless WordPress client.
 *
 * WordPress (alifvisa.com) stays the source of truth for posts, pages,
 * applications, WooCommerce orders and Stripe payments. This front end
 * reads published content through the WordPress REST API.
 *
 * Without WP_API_URL (local preview, static export) it falls back to a
 * content snapshot so every template can still be reviewed offline.
 */
export type Post = {
  slug: string;
  title: string;
  excerpt: string;
  date: string;
  content: string;
  keyword?: string;
  words?: number;
};

const API = process.env.WP_API_URL;
const REVALIDATE = Number(process.env.WP_REVALIDATE ?? 600);

const strip = (s: string) => s.replace(/<[^>]+>/g, '').replace(/&#8217;/g, '’').replace(/&amp;/g, '&').trim();

type WpPost = { slug: string; date: string; title: { rendered: string }; excerpt: { rendered: string }; content: { rendered: string } };

const fromWp = (p: WpPost): Post => ({
  slug: p.slug,
  date: p.date.slice(0, 10),
  title: strip(p.title.rendered),
  excerpt: strip(p.excerpt.rendered),
  content: p.content.rendered,
});

async function wp<T>(path: string): Promise<T | null> {
  if (!API) return null;
  try {
    const res = await fetch(`${API}${path}`, { next: { revalidate: REVALIDATE } });
    if (!res.ok) return null;
    return (await res.json()) as T;
  } catch {
    return null;
  }
}

export async function getPosts(limit = 12): Promise<Post[]> {
  const data = await wp<WpPost[]>(`/wp/v2/posts?per_page=${limit}&_fields=slug,date,title,excerpt,content`);
  if (data) return data.map(fromWp);
  return (snapshot as Post[]).slice(0, limit);
}

export async function getPost(slug: string): Promise<Post | null> {
  const data = await wp<WpPost[]>(`/wp/v2/posts?slug=${encodeURIComponent(slug)}&_fields=slug,date,title,excerpt,content`);
  if (data) return data[0] ? fromWp(data[0]) : null;
  return (snapshot as Post[]).find((p) => p.slug === slug) ?? null;
}

export async function getPostSlugs(): Promise<string[]> {
  const data = await wp<{ slug: string }[]>(`/wp/v2/posts?per_page=100&_fields=slug`);
  if (data) return data.map((p) => p.slug);
  return (snapshot as Post[]).map((p) => p.slug);
}

export const readingTime = (p: Post) => Math.max(3, Math.round((p.words ?? strip(p.content).split(/\s+/).length) / 230));
