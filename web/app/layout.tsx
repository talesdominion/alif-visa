import type { Metadata } from 'next';
import '@fontsource-variable/inter';
import './globals.css';
import Header from '@/components/Header';
import Footer from '@/components/Footer';
import { site } from '@/data/site';

export const metadata: Metadata = {
  metadataBase: new URL(site.url),
  title: { default: 'Alif Visa | Online Visa Assistance Worldwide, UK Registered', template: '%s | Alif Visa' },
  description: 'Check visa requirements by nationality and destination, prepare a complete file, and track your application with a UK-registered visa assistance company.',
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en-GB">
      <body>
        <Header />
        <main id="main">{children}</main>
        <Footer />
        <a className="wa" href={site.whatsapp} target="_blank" rel="noopener noreferrer"><i /><span>Chat on WhatsApp</span></a>
      </body>
    </html>
  );
}
