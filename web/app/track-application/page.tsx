import Link from 'next/link';
import { PageHead } from '@/components/ui';

export const metadata = { title: 'Track your application', description: 'Follow your visa application with your reference and email address.' };

const stages = ['Application received', 'Documents under review', 'Ready for submission', 'Submitted to the authority', 'Decision received'];

export default function Track() {
  return (
    <>
      <PageHead label="Tracking" title="Track your visa application" lead="Enter the reference from your confirmation email and the email address on the application." crumbs={[{ label: 'Track application' }]} />
      <section className="section-tight">
        <div className="wrap layout" style={{ gridTemplateColumns: 'minmax(0,1fr) 380px' }}>
          <form className="form-card" action="/track-application/" method="get">
            <div className="field"><label htmlFor="tref">Application number</label><input id="tref" name="ref" placeholder="ALF-2026-000123" /></div>
            <div className="field"><label htmlFor="temail">Email address</label><input id="temail" name="email" type="email" placeholder="you@example.com" /></div>
            <button className="btn btn-primary" type="submit" style={{ width: '100%' }}>Track application</button>
            <p className="muted small" style={{ margin: '14px 0 0' }}>Have an account? <a className="link" href="/login/">Sign in</a> to see every application, message your agent and upload documents.</p>
          </form>
          <aside>
            <div className="facts">
              <div className="h">The stages your file moves through</div>
              <ol className="numbered" style={{ padding: '4px 20px 10px' }}>{stages.map((s) => <li key={s}>{s}</li>)}</ol>
            </div>
          </aside>
        </div>
      </section>
    </>
  );
}
