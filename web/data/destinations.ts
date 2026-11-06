export type Destination = {
  slug: string; name: string; code: string; region: string;
  summary: string; routes: string[]; note?: string;
};

export const destinations: Destination[] = [
  { slug: 'united-kingdom', name: 'United Kingdom', code: 'gb', region: 'Europe', summary: 'Standard Visitor, business and family routes, plus the Electronic Travel Authorisation for eligible nationalities.', routes: ['visit-visa', 'business-visa', 'family-visa', 'evisa', 'transit-visa'] },
  { slug: 'united-states', name: 'United States', code: 'us', region: 'North America', summary: 'B1/B2 visitor visas with an interview, and ESTA for Visa Waiver Program nationals.', routes: ['visit-visa', 'business-visa', 'conference-visa', 'transit-visa'] },
  { slug: 'canada', name: 'Canada', code: 'ca', region: 'North America', summary: 'Visitor visas with biometrics, and the eTA for visa-exempt travellers flying in.', routes: ['visit-visa', 'business-visa', 'evisa', 'family-visa'] },
  { slug: 'australia', name: 'Australia', code: 'au', region: 'Oceania', summary: 'Visitor visas, eVisitor and ETA, all lodged online with the Department of Home Affairs.', routes: ['visit-visa', 'business-visa', 'evisa'] },
  { slug: 'france', name: 'France', code: 'fr', region: 'Europe', summary: 'Schengen short-stay visas, plus long-stay study and work permits for non-EU nationals.', routes: ['visit-visa', 'business-visa', 'conference-visa', 'required-visa-invitation'] },
  { slug: 'germany', name: 'Germany', code: 'de', region: 'Europe', summary: 'Schengen short-stay visas, often with a formal obligation letter from the host.', routes: ['visit-visa', 'business-visa', 'conference-visa', 'required-visa-invitation'] },
  { slug: 'italy', name: 'Italy', code: 'it', region: 'Europe', summary: 'Schengen visas for tourism, business and visiting family.', routes: ['visit-visa', 'business-visa', 'family-visa'] },
  { slug: 'ireland', name: 'Ireland', code: 'ie', region: 'Europe', summary: 'Irish short-stay visit and business visas, separate from the Schengen system.', routes: ['visit-visa', 'business-visa', 'family-visa'] },
  { slug: 'japan', name: 'Japan', code: 'jp', region: 'Asia', summary: 'Short-term stay visas and eVisa for eligible nationalities.', routes: ['visit-visa', 'business-visa', 'evisa'] },
  { slug: 'new-zealand', name: 'New Zealand', code: 'nz', region: 'Oceania', summary: 'Visitor visas, and the NZeTA for visa-waiver travellers.', routes: ['visit-visa', 'evisa', 'transit-visa'] },
  { slug: 'thailand', name: 'Thailand', code: 'th', region: 'Asia', summary: 'Tourist visas and the Thailand eVisa, with visa exemption for many nationalities.', routes: ['visit-visa', 'evisa', 'business-visa'] },
  { slug: 'united-arab-emirates', name: 'United Arab Emirates', code: 'ae', region: 'Middle East', summary: 'Tourist and visit visas, often arranged online for short stays.', routes: ['visit-visa', 'evisa', 'transit-visa'] },
];

export const nationalities = [
  ['gb', 'United Kingdom'], ['in', 'India'], ['ng', 'Nigeria'], ['ph', 'Philippines'], ['pk', 'Pakistan'],
  ['bd', 'Bangladesh'], ['ae', 'United Arab Emirates'], ['sa', 'Saudi Arabia'], ['cn', 'China'], ['tr', 'Turkey'],
  ['us', 'United States'], ['ca', 'Canada'], ['au', 'Australia'], ['de', 'Germany'], ['es', 'Spain'], ['nl', 'Netherlands'],
] as const;

export const bySlug = (slug: string) => destinations.find((d) => d.slug === slug);
