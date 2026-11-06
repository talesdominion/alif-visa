export type VisaRoute = {
  slug: string; name: string; short: string; intro: string;
  who: string[]; documents: string[]; stay: string; entries: string;
};

export const routes: VisaRoute[] = [
  {
    slug: 'visit-visa', name: 'Visit Visa', short: 'Tourism, sightseeing and short family visits.',
    intro: 'The standard route for short, temporary visits where you do not intend to work or settle. Most destinations want to see who you are, what you plan to do, how the trip is funded and why you will return home afterwards.',
    who: ['Holidays and sightseeing', 'Short stays with friends or family', 'Attending a wedding or family event'],
    documents: ['Passport valid for the whole trip', 'Recent passport-style photograph', 'Travel itinerary and accommodation details', 'Bank statements covering the last 3–6 months', 'Employment, study or business status letter'],
    stay: 'Usually up to 30–90 days per visit', entries: 'Single or multiple, depending on the destination',
  },
  {
    slug: 'business-visa', name: 'Business Visa', short: 'Meetings, negotiations and corporate travel.',
    intro: 'For short commercial trips: client meetings, site visits, negotiations and contract signings. Officers look for a clear business purpose, an inviting company and proof of who pays.',
    who: ['Client and supplier meetings', 'Negotiations and contract signings', 'Site visits and due diligence'],
    documents: ['Passport valid for the whole trip', 'Invitation letter from the host company', 'Letter from your employer confirming the trip', 'Company and personal bank statements', 'Travel itinerary and accommodation'],
    stay: 'Usually up to 90 days per visit', entries: 'Single or multiple',
  },
  {
    slug: 'required-visa-invitation', name: 'Required Visa Invitation', short: 'Host or business invitation letter.',
    intro: 'Some destinations ask for a formal invitation from a host or company before a visa can be issued. We help hosts prepare the letter and any official forms the destination uses.',
    who: ['Visiting friends or relatives abroad', 'Business visitors invited by a company', 'Event and conference delegates'],
    documents: ["Host's ID or residence permit", "Host's address and contact details", 'Purpose and dates of the visit', 'Who pays for accommodation and costs', 'Official guarantee form where required'],
    stay: 'Matches the visa it supports', entries: 'Matches the visa it supports',
  },
  {
    slug: 'evisa', name: 'eVisa', short: 'Electronic authorisations issued online.',
    intro: 'Many countries now issue visas and travel authorisations entirely online. The form is short, but small mistakes in names or passport numbers can still cause a refusal or a problem at boarding.',
    who: ['Travellers to countries with online visas', 'Visa-exempt travellers who need an ETA or ESTA', 'Short tourist and business trips'],
    documents: ['Passport scan', 'Digital photograph', 'Travel dates and address abroad', 'Payment card for the government fee'],
    stay: 'Set by each country', entries: 'Single or multiple',
  },
  {
    slug: 'family-visa', name: 'Family Visa', short: 'Spouse, dependant and relative applications.',
    intro: 'Family routes depend on proving the relationship and, often, the sponsor’s income and accommodation. These files are document-heavy, so organisation matters.',
    who: ['Spouses and partners', 'Children and dependants', 'Parents and other relatives'],
    documents: ['Marriage or birth certificates', "Sponsor's ID and immigration status", "Sponsor's income evidence", 'Proof of accommodation', 'Evidence the relationship is genuine'],
    stay: 'Short visits or long-term, depending on the route', entries: 'Depends on the route',
  },
  {
    slug: 'transit-visa', name: 'Transit Visa', short: 'Short stops and airside connections.',
    intro: 'Some nationalities need a visa just to change planes, even without leaving the airport. We check the rule for your nationality, airport and onward ticket.',
    who: ['Connecting flights through visa-required hubs', 'Short layovers that leave the airport'],
    documents: ['Passport', 'Onward ticket', 'Visa for the final destination', 'Booking showing the connection'],
    stay: 'Usually 24–72 hours', entries: 'Single',
  },
  {
    slug: 'conference-visa', name: 'Conference Visa', short: 'Summits, exhibitions and trade fairs.',
    intro: 'For delegates, speakers and exhibitors. Organisers’ letters, registration and the dates of the event are the core of the file.',
    who: ['Conference delegates and speakers', 'Trade fair exhibitors and staff', 'Training and workshop attendees'],
    documents: ['Registration confirmation', "Organiser's invitation letter", 'Employer letter', 'Proof of funds', 'Accommodation booking'],
    stay: 'Event dates plus travel days', entries: 'Single or multiple',
  },
];

export const routeBySlug = (slug: string) => routes.find((r) => r.slug === slug);
