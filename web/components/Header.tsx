import Link from 'next/link';
import { mainNav, site } from '@/data/site';

export default function Header() {
  return (
    <>
      <div className="topbar">
        <div className="wrap">
          <div className="tb-left">
            <span><i className="dot" />UK-registered · Company No. {site.companyNo}</span>
            <a className="hide-sm" href={site.phoneHref}>{site.phone}</a>
          </div>
          <div className="tb-right">
            <a href={`mailto:${site.email}`}>{site.email}</a>
            <Link href="/track-application/">Track application</Link>
            <a href="/login/">Sign in</a>
          </div>
        </div>
      </div>
      <header className="header">
        <input type="checkbox" id="menu" className="menu-toggle" aria-hidden="true" />
        <div className="wrap">
          <Link href="/" className="logo" aria-label="Alif Visa home">
            <img src="/brand/logo-trim.png" alt="alifvisa" width={140} height={37} />
          </Link>
          <nav className="nav" aria-label="Main">
            {mainNav.map((n) => (
              <Link key={n.href} href={n.href}>{n.label}</Link>
            ))}
          </nav>
          <div className="actions">
            <Link className="btn btn-ghost btn-sm" href="/track-application/">Track</Link>
            <Link className="btn btn-primary btn-sm" href="/visa/search/">Get started</Link>
          </div>
          <label htmlFor="menu" className="burger" aria-label="Open menu"><span /></label>
        </div>
        <nav className="mobile-nav" aria-label="Mobile">
          {mainNav.map((n) => (
            <Link key={n.href} href={n.href}>{n.label}</Link>
          ))}
          <Link href="/track-application/">Track application</Link>
          <Link className="btn btn-primary" href="/visa/search/">Get started</Link>
        </nav>
      </header>
    </>
  );
}
