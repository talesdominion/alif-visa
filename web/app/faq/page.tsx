import { Cta, PageHead } from '@/components/ui';
import { faqs } from '@/data/faqs';

export const metadata = { title: 'Frequently asked questions', description: 'Answers about visa requirements, documents, processing times, tracking and fees.' };

export default function Faq() {
  const ld = { '@context': 'https://schema.org', '@type': 'FAQPage', mainEntity: faqs.map((f) => ({ '@type': 'Question', name: f.q, acceptedAnswer: { '@type': 'Answer', text: f.a } })) };
  return (
    <>
      <PageHead label="FAQ" title="Questions we are asked most" lead="If your situation is not covered here, contact us and a member of the team will look at it with you." crumbs={[{ label: 'FAQ' }]} />
      <section className="section-tight">
        <div className="wrap" style={{ maxWidth: 860 }}>
          <div className="faq">{faqs.map((f) => <details key={f.q}><summary>{f.q}</summary><p>{f.a}</p></details>)}</div>
        </div>
      </section>
      <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(ld) }} />
      <Cta />
    </>
  );
}
