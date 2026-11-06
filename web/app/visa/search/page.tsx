import SearchCard from '@/components/SearchCard';
import { PageHead } from '@/components/ui';
import { destinations } from '@/data/destinations';
import { routes } from '@/data/routes';

const initial = '<h2 style="font-size:24px;margin-bottom:18px">Popular destinations</h2>' + destinations.slice(0, 4).map((d) => `<div class="card" style="margin-bottom:16px"><h3>${d.name}</h3><p>${d.summary}</p><a class="more arrow" href="/countries/${d.slug}/">See visa routes</a></div>`).join('');

export const metadata = { title: 'Check visa requirements', description: 'See the visa routes that apply to your nationality, destination and reason for travel.' };

// Results are filtered in the browser from the query string, so the page
// can be statically generated and still respond to every search.
const data = destinations.map((d) => ({ slug: d.slug, name: d.name, code: d.code, routes: d.routes }));
const routeData = Object.fromEntries(routes.map((r) => [r.slug, { name: r.name, short: r.short, stay: r.stay }]));

const script = `(function(){
var D=${JSON.stringify(data)},R=${JSON.stringify(routeData)};
var q=new URLSearchParams(location.search),to=q.get('to'),pu=q.get('purpose'),fr=q.get('from');
var f=document.getElementById('from'),t=document.getElementById('to'),p=document.getElementById('purpose');
if(fr&&f)f.value=fr;if(to&&t)t.value=to;if(pu&&p)p.value=pu;
var box=document.getElementById('results');if(!box)return;
var list=to?D.filter(function(d){return d.slug===to}):D.filter(function(d){return !pu||d.routes.indexOf(pu)>-1}).slice(0,6);
var h='';list.forEach(function(d){var rs=d.routes.slice().sort(function(a,b){return (b===pu)-(a===pu)});
h+='<div class="card" style="margin-bottom:16px"><div style="display:flex;align-items:center;gap:12px;margin-bottom:14px"><img class="flag" style="width:40px;height:28px;border-radius:4px;box-shadow:0 0 0 1px rgba(19,32,26,.08)" src="/flags/'+d.code+'.svg" alt=""><h3 style="margin:0">'+d.name+'</h3><a class="link arrow" style="margin-left:auto;font-size:14px" href="/countries/'+d.slug+'/">Destination guide</a></div>';
rs.forEach(function(s){var r=R[s];h+='<a href="/visa/'+s+'/" style="display:flex;justify-content:space-between;gap:16px;padding:14px 0;border-top:1px solid var(--line)"><span><strong>'+r.name+(s===pu?' <span class="pill" style="margin-left:6px">Matches your trip</span>':'')+'</strong><br><span class="muted small">'+r.short+' '+r.stay+'.</span></span><span class="link arrow" style="align-self:center;white-space:nowrap">Requirements</span></a>'});
h+='</div>'});
var ttl=to?'Visa routes for your trip':'Popular destinations'+(pu&&R[pu]?' for '+R[pu].name:'');
box.innerHTML='<h2 style="font-size:24px;margin-bottom:18px">'+ttl+'</h2>'+(h||'<div class="results-empty">No routes found. Try another destination or contact us.</div>');
})();`;

export default function Search() {
  return (
    <>
      <PageHead label="Visa requirements" title="Check what your trip needs" lead="Choose your nationality, destination and reason for travel. We show the routes that normally apply and what each one asks for." crumbs={[{ label: 'Check requirements' }]} />
      <section className="section-tight">
        <div className="wrap layout" style={{ gridTemplateColumns: '380px minmax(0,1fr)' }}>
          <div className="aside" style={{ top: 96 }}><SearchCard title="Your trip" /></div>
          <div>
            {/* Filled by the inline script from the query string; React leaves innerHTML alone. */}
            <div id="results" dangerouslySetInnerHTML={{ __html: initial }} />
            <p className="notice">Requirements change. When you start an application we confirm the current published list for your nationality and purpose of travel.</p>
          </div>
        </div>
      </section>
      <script dangerouslySetInnerHTML={{ __html: script }} />
    </>
  );
}
