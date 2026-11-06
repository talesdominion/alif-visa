export const site = {
  name: 'Alif Visa',
  legalName: 'Alif Visa Ltd',
  companyNo: '17305563',
  tagline: 'Visa assistance · Travel services · Worldwide',
  phone: '+44 7482 331249',
  phoneHref: 'tel:+447482331249',
  email: 'info@alifvisa.com',
  whatsapp: 'https://wa.me/447482331249',
  addressLines: ['Office 1349, 85 Dunstall Hill', 'Wolverhampton WV6 0SR', 'United Kingdom'],
  hours: 'Monday to Friday, 09:00 – 18:00 (UK time)',
  playStore: 'https://play.google.com/store/apps/details?id=com.alifvisa.app',
  url: 'https://alifvisa.com',
};

export const mainNav = [
  { label: 'Destinations', href: '/countries/' },
  { label: 'Visa types', href: '/visa/' },
  { label: 'Travel services', href: '/services/' },
  { label: 'Guides', href: '/blog/' },
  { label: 'About', href: '/about/' },
  { label: 'Contact', href: '/contact/' },
];

export const footerNav = [
  {
    title: 'Visa types',
    links: [
      { label: 'Visit Visa', href: '/visa/visit-visa/' },
      { label: 'Business Visa', href: '/visa/business-visa/' },
      { label: 'eVisa', href: '/visa/evisa/' },
      { label: 'Family Visa', href: '/visa/family-visa/' },
      { label: 'Transit Visa', href: '/visa/transit-visa/' },
      { label: 'All visa types', href: '/visa/' },
    ],
  },
  {
    title: 'Destinations',
    links: [
      { label: 'United Kingdom', href: '/countries/united-kingdom/' },
      { label: 'United States', href: '/countries/united-states/' },
      { label: 'Canada', href: '/countries/canada/' },
      { label: 'Australia', href: '/countries/australia/' },
      { label: 'France', href: '/countries/france/' },
      { label: 'All destinations', href: '/countries/' },
    ],
  },
  {
    title: 'Travel services',
    links: [
      { label: 'Flight Booking', href: '/services/flight-booking/' },
      { label: 'Hotel Booking', href: '/services/hotel-booking/' },
      { label: 'Travel Insurance', href: '/services/travel-insurance/' },
      { label: 'Visa Appointment', href: '/services/visa-appointment/' },
      { label: 'Invitation Letter', href: '/services/invitation-letter/' },
      { label: 'Document Preparation', href: '/services/document-preparation/' },
    ],
  },
  {
    title: 'Company',
    links: [
      { label: 'About Alif Visa', href: '/about/' },
      { label: 'Guides & articles', href: '/blog/' },
      { label: 'FAQ', href: '/faq/' },
      { label: 'Track application', href: '/track-application/' },
      { label: 'Contact', href: '/contact/' },
    ],
  },
];

export const legalNav = [
  { label: 'Privacy Policy', href: '/privacy/' },
  { label: 'Terms', href: '/terms/' },
  { label: 'Refund Policy', href: '/refund-policy/' },
  { label: 'Cookie Policy', href: '/cookie-policy/' },
];
