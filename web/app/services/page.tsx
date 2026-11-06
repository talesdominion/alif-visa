import Link from 'next/link';
import { Cta, PageHead } from '@/components/ui';
import { services } from '@/data/services';

export const metadata = { title: 'Travel services', description: 'Flight and hotel reservations, travel insurance, appointments, invitation letters and document preparation for your visa file.' };

export default function Services() {
  return (
    <>
      <PageHead label="Travel services" title="Everything your visa file needs" lead="Most refusals come down to supporting evidence rather than the form itself. These services make that evidence straightforward." crumbs={[{ label: 'Travel services' }]} />
      <section className="section-tight">
        <div className="wrap grid g3">
          {services.map((s, i) => (
            <Link key={s.slug} href={`/services/${s.slug}/`} className="card route">
              <span className="icon">{String(i + 1).padStart(2, '0')}</span>
              <h3>{s.name}</h3>
              <p>{s.short}</p>
              <span className="more arrow">Learn more</span>
            </Link>
          ))}
        </div>
      </section>
      <Cta />
    </>
  );
}
