import Link from 'next/link';
import { footerNav, legalNav, site } from '@/data/site';

export default function Footer() {
  return (
    <footer className="footer">
      <div className="wrap">
        <div className="top">
          <div className="brand">
            <img src="/brand/logo-white.png" alt="alifvisa" width={130} height={34} />
            <p>Private visa assistance for travellers worldwide. We prepare a complete, checked file; the embassy decides.</p>
            <div className="contact-lines">
              <a href={site.phoneHref}>{site.phone}</a>
              <a href={`mailto:${site.email}`}>{site.email}</a>
              <span>{site.hours}</span>
            </div>
          </div>
          {footerNav.map((col) => (
            <div key={col.title}>
              <h4>{col.title}</h4>
              <ul>
                {col.links.map((l) => (
                  <li key={l.href}><Link href={l.href}>{l.label}</Link></li>
                ))}
              </ul>
            </div>
          ))}
        </div>
        <div className="legal">
          <div className="reg">
            <strong>ALIF VISA LTD</strong> <em>·</em> Registered in England and Wales <em>·</em> Company No. {site.companyNo}
            <br />Registered office: {site.addressLines.join(', ')}
          </div>
          <nav aria-label="Legal">
            {legalNav.map((l) => <Link key={l.href} href={l.href}>{l.label}</Link>)}
          </nav>
        </div>
      </div>
    </footer>
  );
}
