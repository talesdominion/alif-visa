import Link from 'next/link';
import { Cta, PageHead } from '@/components/ui';
import { site } from '@/data/site';

export const metadata = { title: 'About Alif Visa', description: 'Alif Visa Ltd is a UK-registered visa assistance company based in Wolverhampton, helping travellers worldwide.' };

const principles = [
  { t: 'We prepare the file. The embassy decides.', d: 'We do not issue visas and we never claim to influence a decision. Our job is a complete, consistent, well-evidenced application.' },
  { t: 'Honest about difficult routes', d: 'If a route looks unlikely to succeed, we say so before you pay, not after.' },
  { t: 'Fees shown separately', d: 'Government and visa centre fees are set by the authority and always shown apart from our service fee.' },
  { t: 'Your documents stay private', d: 'Passports and personal records are visible only to you and the staff working on your file.' },
];

export default function About() {
  return (
    <>
      <PageHead label="About us" title="Private visa assistance, stated plainly" lead={`${site.legalName} is a UK-registered visa assistance company based in Wolverhampton. We help travellers of any nationality check requirements, prepare a complete file and follow it to a decision.`} crumbs={[{ label: 'About' }]} />
      <section className="section">
        <div className="wrap split">
          <div>
            <span className="label">How we work</span>
            <h2 style={{ fontSize: 'clamp(28px,3.4vw,38px)', margin: '10px 0 16px' }}>Four principles behind every application</h2>
            <p className="lead">Visa applications are refused for avoidable reasons more often than people expect. We exist to remove those reasons before anything is submitted.</p>
          </div>
          <ul className="checklist">{principles.map((p) => <li key={p.t}><i className="tick" style={{ marginTop: 4 }} /><div><strong>{p.t}</strong><span>{p.d}</span></div></li>)}</ul>
        </div>
      </section>
      <section className="section wash">
        <div className="wrap grid g3">
          <div className="card"><span className="label">Registered</span><h3 style={{ marginTop: 10 }}>{site.legalName}</h3><p>Registered in England and Wales, Company No. {site.companyNo}.</p></div>
          <div className="card"><span className="label">Office</span><h3 style={{ marginTop: 10 }}>Wolverhampton, UK</h3><p>{site.addressLines.join(', ')}.</p></div>
          <div className="card"><span className="label">Support</span><h3 style={{ marginTop: 10 }}>Talk to a person</h3><p>{site.hours}. Phone, email or WhatsApp.</p><Link className="more arrow" href="/contact/">Contact us</Link></div>
        </div>
      </section>
      <Cta />
    </>
  );
}
