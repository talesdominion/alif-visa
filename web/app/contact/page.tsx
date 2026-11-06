import { PageHead } from '@/components/ui';
import { site } from '@/data/site';

export const metadata = { title: 'Contact Alif Visa', description: 'Questions about a route, a document or an application in progress? Contact our UK team.' };

export default function Contact() {
  return (
    <>
      <PageHead label="Contact" title="Talk to the Alif Visa team" lead="Questions about a route, a document or an application in progress? Our UK team answers by phone, email, WhatsApp or the form below." crumbs={[{ label: 'Contact' }]} />
      <section className="section-tight">
        <div className="wrap layout" style={{ gridTemplateColumns: 'minmax(0,1fr) 380px' }}>
          {/* In production this posts to the WordPress contact endpoint. */}
          <form className="form-card" action="/wp-json/alif/v1/contact" method="post">
            <h2 style={{ fontSize: 22, marginBottom: 18 }}>Send us a message</h2>
            <div className="row2">
              <div className="field"><label htmlFor="name">Full name</label><input id="name" name="name" required /></div>
              <div className="field"><label htmlFor="cemail">Email</label><input id="cemail" name="email" type="email" required /></div>
            </div>
            <div className="row2">
              <div className="field"><label htmlFor="phone">Phone (optional)</label><input id="phone" name="phone" /></div>
              <div className="field"><label htmlFor="topic">Topic</label><select id="topic" name="topic" defaultValue="new"><option value="new">A new application</option><option value="existing">An existing application</option><option value="services">Travel services</option><option value="other">Something else</option></select></div>
            </div>
            <div className="field"><label htmlFor="msg">Message</label><textarea id="msg" name="message" required /></div>
            <button className="btn btn-primary" type="submit">Send message</button>
            <p className="muted small" style={{ margin: '12px 0 0' }}>We reply on working days. Please do not send passport scans by email; upload them to your application instead.</p>
          </form>
          <aside>
            <ul className="info-list">
              <li><span className="k">Phone</span><a className="v" href={site.phoneHref}>{site.phone}</a></li>
              <li><span className="k">Email</span><a className="v" href={`mailto:${site.email}`}>{site.email}</a></li>
              <li><span className="k">WhatsApp</span><a className="v link" href={site.whatsapp} target="_blank" rel="noopener noreferrer">Message us on WhatsApp</a></li>
              <li><span className="k">Office</span><span className="v">{site.addressLines.join(', ')}</span></li>
              <li><span className="k">Hours</span><span className="v">{site.hours}</span></li>
            </ul>
          </aside>
        </div>
      </section>
    </>
  );
}
