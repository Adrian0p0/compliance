<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('adress');
            $table->longText('description-ro');
            $table->longText('description-de');
            $table->longText('description-en');
            $table->string('contact')->default('webmaster@ibbit.ro');
            $table->timestamps();
        });

        $data = [
            [
                'name' => 'IBB Haus- und Industriebau GmbH',
                'adress' => 'Otto-Scheugenpflug-Str. 20 63073, Offenbach am Main',
                'description-ro' => 'IBB Haus- und Industriebau GmbH este prima companie de construcții din grupul de firme IBB, înființată în Offenbach am Main, în anul 2012. Este o companie ambițioasă, performantă, flexibilă, deschisă spre inovare, cu un model organizațional ce permite implementarea proiectelor de amploare diferită, mici, medii sau mari, cu un real succes. Dispune de o infrastructură excelentă, dar mai ales de o echipă de înaltă competență profesională, capabilă să satisfacă cele mai exigente cerințe ale clienților. Compania IBB Haus- und Industriebau GmbH oferă partenerilor un mediu excelent pentru dezvoltarea celor mai îndrăznețe proiecte de construcții în domenii precum cel al construcțiilor civile și industriale, dezvoltare imobiliară, construcții de drumuri, poduri și autostrăzi etc.

                Printre proiectele de construcții dezvoltate de IBB Haus- und Industriebau GmbH se numără: sediul central STIHL din Stuttgart-Waiblingen, cu showroom și muzeu, finalizat în martie 2021; Fabrica pentru E-Auto de la Porsche in Stuttgart; Fabrica pentru E-Auto de la Daimler in Sindelfingen; Cladirea de birouri de 30 de etaje Winx din Frankfurt.',
                'description-de' => 'Die IBB Haus- und Industriebau GmbH ist das erste Bauunternehmen der IBB-Firmengruppe und wurde 2012 in Offenbach am Main gegründet. Es handelt sich um ein ehrgeiziges, leistungsfähiges, flexibles und innovationsfreudiges Unternehmen mit einem Organisationsmodell, das die erfolgreiche Durchführung von Projekten unterschiedlicher Größenordnung, ob klein, mittel oder groß, ermöglicht. Sie verfügt über eine hervorragende Infrastruktur, vor allem aber über ein hochprofessionelles Team, das in der Lage ist, auch die anspruchsvollsten Kundenwünsche zu erfüllen. Die IBB Haus- und Industriebau GmbH bietet ihren Partnern ein ausgezeichnetes Umfeld für die Entwicklung anspruchsvoller Bauprojekte in den Bereichen Hoch- und Industriebau, Immobilienentwicklung, Straßen-, Brücken- und Autobahnbau.

                Zu den von der IBB Haus- und Industriebau GmbH entwickelten Bauprojekten gehören: die STIHL-Zentrale in Stuttgart-Waiblingen mit Showroom und Museum, die im März 2021 fertiggestellt wird; die Porsche E-Auto-Fabrik in Stuttgart; die Daimler E-Auto-Fabrik in Sindelfingen; das 30-stöckige Bürogebäude Winx in Frankfurt.',
                'description-en' => 'IBB Haus- und Industriebau GmbH is the first construction company in the IBB group of companies, founded in Offenbach am Main in 2012. It is an ambitious, efficient, flexible company, open to innovation, with an organizational model that allows the implementation of large projects. different, small, medium or large, with real success. It has an excellent infrastructure, but above all a team of high professional competence, able to satisfy the most demanding requirements of customers. IBB Haus- und Industriebau GmbH offers its partners an excellent environment for the development of the most daring construction projects in areas such as civil and industrial construction, real estate development, road construction, bridges and highways, etc.

                Construction projects developed by IBB Haus- und Industriebau GmbH include: STIHL headquarters in Stuttgart-Waiblingen, with showroom and museum, completed in March 2021; Porsche E-Auto Factory in Stuttgart; Daimler E-Auto Factory in Sindelfingen; Frankfurt 30-storey Winx office building.',
            ],
            [
                'name' => 'IBB-HIB Romania S.R.L.',
                'adress' => 'Șoseaua de Centură 48A C 077145, Pantelimon',
                'description-ro' => 'IBB HIB România face parte din grupul de companii IBB și desfășoară activități generale de construcții pe teritoriul României începând cu anul 2016. Numeroasele proiecte de construcții finalizate dovedesc experiența solidă, eficiența și profesionalismul. IBB HIB România este o companie puternică, flexibilă și capabilă să se plieze pe nevoile fiecărui client cu o gamă de servicii ce include construcția și vânzarea de proprietăți rezidențiale și comerciale ca promotori; construcții civile și industriale; săpături și terasamente; execuție de drumuri, autostrăzi și poduri; furnizarea de mixturi asfaltice; demolări; închirieri utilaje de construcții pentru terasamente, excavații, nivelări, compactări, transport de materiale, etc.',
                'description-de' => 'Die IBB HIB Romania ist Teil der IBB-Unternehmensgruppe und bietet seit 2016 unterschiedliche Baudienstleistungen in Rumänien an. Zahlreiche abgeschlossene Bauprojekte belegen die solide Erfahrung mit hoher Effizienz und Professionalität. Die IBB HIB Romania ist ein starkes, flexibles Unternehmen, das sich mit einer Reihe von Dienstleistungen an die Bedürfnisse und Wünsche eines jeden Kunden anpassen kann. Darunter der Bau und Verkauf von Wohn- und Gewerbeimmobilien als Bauträger; Tief- und Industriebau; Aushub- und Erdarbeiten; Ausführung von Straßen, Autobahnen und Brücken; Lieferung von Asphaltmischungen; Abbrucharbeiten; Vermietung von Baumaschinen für Erdarbeiten, Aushub, Nivellierung, Verdichtung, Materialtransport.',
                'description-en' => 'IBB HIB Romania is part of the IBB group of companies and has been carrying out general construction activities in Romania since 2016. Numerous completed construction projects prove our solid experience, efficiency and professionalism. IBB HIB Romania is a strong, flexible company able to adapt to the needs of each client with a range of services including construction and sale of residential and commercial properties as developers; civil and industrial construction; excavation and earthworks; execution of roads, highways and bridges; supply of asphalt mixtures; demolitions; rental of construction machinery for earthworks, excavations, levelling, compacting, material transportation, etc.',
            ],
            [
                'name' => 'IBB IT SYSTEM S.R.L.',
                'adress' => 'Strada Tudor Vladimirescu 2 720036, Suceava',
                'description-ro' => 'IBB IT SYSTEM face parte din grupul de companii IBB și oferă servicii de implementare efectivă a soluțiilor IT pentru a asigura un plus de valoare construcțiilor. Planul construirii unui viitor mai bun cuprinde atât spații proiectate și executate la cele mai înalte standarde cât și soluții scalabile de integrare a tehnologiei în spațiile de lucru sau rezidențiale, iar IBB IT SYSTEM este partenerul optim pentru implementarea rețelelor de date structurale, soluțiilor de tip casă inteligentă, digitalizarea operațiunilor pe șantier, cât și pentru consultanță, configurare & mentenanță pentru achiziții echipamente IT sau sisteme de supraveghere, etc.',
                'description-de' => 'Die IBB IT SYSTEM ist Teil der IBB-Unternehmensgruppe und bietet Dienstleistungen für die effektive Umsetzung von IT-Lösungen zur Wertsteigerung von Gebäuden. Der Plan für den Aufbau einer besseren Zukunft umfasst sowohl Räume, die nach höchsten Standards geplant und ausgeführt werden, als auch skalierbare Lösungen für die Integration von Technologie in Arbeits- oder Wohnräume. Die IBB IT SYSTEM ist der optimale Partner für die Implementierung von strukturellen Datennetzwerken, Smart-Home-Lösungen, die Digitalisierung von Baustellenabläufen sowie für die Beratung, Konfiguration und Wartung bei der Anschaffung von IT-Geräten oder Überwachungssystemen.',
                'description-en' => 'IBB IT SYSTEM is part of the IBB group of companies and provides services for the effective implementation of IT solutions to add value to buildings. The plan for building a better future includes both spaces designed and executed to the highest standards and scalable solutions for integrating technology into work or residential spaces, and IBB IT SYSTEM is the optimal partner for the implementation of structural data networks, smart home solutions, digitization of site operations, as well as consulting, configuration & maintenance for IT equipment purchases or surveillance systems, etc.',
            ],
            [
                'name' => 'IBB-HIB Logistics S.R.L.',
                'adress' => 'Soseaua de Centura 48 A 077145, Pantelimon',
                'description-ro' => 'IBB LOGISTICS face parte din grupul de companii IBB și asigură suportul logistic al șantierelor având la dispoziție o impozantă flotă de utilaje de construcții si autoturisme, disponibilă inclusiv pentru închiriere, precum și servicii de reparații și întreținere, prin intermediul unui atelier service dotat cu tehnologie de vârf. Experiența bogată în domeniul construcțiilor este completată și potențată de investițiile permanente în utilaje cu tehnologie de vârf, ce asigură eficientizarea operațiunilor șantierelor, desfășurarea activităților de construcții în deplină siguranță, optimizarea costurilor și creșterea calității și vitezei execuției lucrărilor, indiferent de complexitatea arhitecturală a proiectelor. Eforturile și performanța din șantierele grupului IBB sunt așadar susținute de utilaje precum excavator Caterpillar șenilat, încărcător frontal Caterpillar, buldoexcavator Caterpillar, motorgrader Caterpillar, freză asfalt cu deplasare pe 4 șenile, autobetonieră Man cu malaxor beton Stetter etc.',
                'description-de' => 'Die IBB LOGISTICS ist Teil der IBB-Unternehmensgruppe und bietet logistische Unterstützung für Baustellen. Eine beeindruckenden Flotte von Baumaschinen und Fahrzeugen, die zur Vermietung zur Verfügung stehen, sowie Reparatur- und Wartungsdienste durch eine mit modernster Technologie ausgestatteten Servicewerkstatt, sind nur einige Bestandteile des Leistungsspektrums. Die vielfältige Erfahrung auf dem Gebiet des Bauwesens wird durch ständige Investitionen in einen hochmodernen Maschinenpark ergänzt und verstärkt. Somit trägt die IBB Logistics auch bei architektonisch anspruchsvollen Projekte zu einer gesteigerten Effizienz bei Baustellenabläufe, Sicherheit bei Bautätigkeiten, Kostenoptimierung und Qualitätssteigerung sowie Beschleunigung der Arbeitsausführung unabhängig von der architektonischen Komplexität der Projekte gewährleistet bei. Die Aufwendungen und Leistungen auf den Baustellen der IBB-Gruppe werden daher durch Maschinen wie Caterpillar-Raupenbagger, Caterpillar-Frontlader, Caterpillar-Baggerlader, Caterpillar-Motorgrader, Caterpillar-Asphaltfräse mit 4 Spuren, Mann-Betonmischer mit Stetter-Betonmischer etc.  umgestetzt.',
                'description-en' => 'IBB LOGISTICS is part of the IBB group of companies and provides logistical support to construction sites with an impressive fleet of construction machinery and vehicles, available for hire, as well as repair and maintenance services through a state-of-the-art service workshop. The rich experience in the field of construction is complemented and enhanced by permanent investments in state-of-the-art machinery, which ensures the efficiency of site operations, safe construction activities, cost optimization and increased quality and speed of work execution, regardless of the architectural complexity of the projects. The efforts and performance on IBB Group sites are therefore supported by machines such as Caterpillar crawler excavator, Caterpillar front-end loader, Caterpillar backhoe loader, Caterpillar motorgrader, Caterpillar 4-track asphalt milling machine, Man concrete mixer with Stetter concrete mixer, etc.',
            ],
            [
                'name' => 'IBB Logistik GmbH',
                'adress' => 'Otto-Scheugenpflug-Str. 20 63073, Offenbach am Main',
                'description-ro' => 'IBB Logistik GmbH face parte din grupul de companii IBB și asigură logistica aferentă fiecărui șantier din Germania. Datorită utilajelor excelent echipate și a generosului parc auto de care dispune, IBB Logistik GmbH asigură eficientizarea operațiunilor specifice șantierelor de construcții complexe, integrând în portofoliu soluții de livrare a materialelor și echipamentelor, transportul personalului de la șantier către cazare, etc., precum și servicii închiriere utilaje de construcții și autoturisme, servicii de reparații și întreținere, prin intermediul unui atelier service dotat cu cele mai bune echipamente tehnice.',
                'description-de' => 'Die IBB Logistik GmbH ist Teil der IBB-Unternehmensgruppe und übernimmt die übergreifende Logistik für jede Baustelle in Deutschland. Mit einem umfassend ausgestatteten Maschinen- und Fuhrpark sorgt die IBB Logistik GmbH für einen effizienten Einsatz auf komplexen Baustellen. In Ihrem Portfolio finden sich Lösungen für die Anlieferung von Material und Geräten, Baumaschinen- und Personentransport, Fahrzeugvermietung sowie Reparatur- und Wartungsleistungen durch eine technisch bestens ausgestattete Servicewerkstatt.',
                'description-en' => 'IBB Logistik GmbH is part of the IBB group of companies and provides the logistics for every construction site in Germany. Thanks to its excellent equipment and generous fleet of vehicles, IBB Logistik GmbH ensures efficient operations on complex construction sites, integrating into its portfolio solutions for the delivery of materials and equipment, transport of personnel from the site to accommodation, etc., as well as construction machinery and vehicle rental, repair and maintenance services, through a service workshop equipped with the best technical equipment.',
            ],
            [
                'name' => 'IBB Immobilien GmbH',
                'adress' => 'Otto-Scheugenpflug-Str. 20
                63073, Offenbach am Main',
                'description-ro' => 'IBB Immobilien GmbH este o companie de construcții recunoscută pe piața de profil din Germania, care desfășoară activități de dezvoltare imobiliară, făcând totodată parte din grupul de firme IBB care reunește peste 1400 de profesioniști din industria construcțiilor.

                Pe lângă serviciile de bază, IBB Immobilien oferă clienților suportul necesar pentru construirea și amenajarea unei locuințe perfecte: optimizarea planurilor în funcție de necesitățile și particularitățile fiecărui client, consiliere în domeniul designului de interior, asistență în selecția și implementarea celor mai inovative soluții de tip smart-home, eco-freindly etc.

                Cele mai recente proiecte imobiliare dezvoltate de IBB Immobilien GmbH: Franz-Rau Living din orașul Heusenstamm, finalizat în 2020; Buchrain Living din Offenbach am Main, un proiect a cărui dezvoltare a fost demarată în iunie 2021, iar finalizarea este preconizată în decembrie 2022.',
                'description-de' => 'Die IBB Immobilien GmbH ist ein Bauunternehmen auf dem deutschen Bauträgermarkt und Teil der IBB Holding, in der mehr als 1400 Fachleute aus der Baubranche zusammengeschlossen/vereint sind.

                Über die grundlegenden Dienstleistungen hinaus, bietet die IBB Immobilien Ihren Kunden die notwendige Unterstützung für den Bau sowie die Einrichtung eines perfekten Zuhauses: Optimierung der Planung entsprechend den Bedürfnissen und Besonderheiten jedes Kunden, konstruktive Beratung im Bereich der Innenarchitektur, effektive Unterstützung bei der Auswahl und Umsetzung der innovativsten Smart-Home- und zugleich umweltfreundlichen Lösungen.

                Die  Immobilienprojekte der IBB Immobilien GmbH: Franz-Rau Living in Heusenstamm, fertiggestellt 2020; Buchrain Living in Offenbach am Main, ein Projekt, dessen Entwicklung im Juni 2021 begann und voraussichtlich im Dezember 2022 abgeschlossen sein wird.',
                'description-en' => 'IBB Immobilien GmbH is a recognised construction company in the German real estate development market and part of the IBB group of companies, which brings together more than 1400 professionals in the construction industry.

                In addition to the basic services, IBB Immobilien offers its clients the necessary support for building and furnishing a perfect home: optimizing plans according to the needs and particularities of each client, advice in the field of interior design, assistance in selecting and implementing the most innovative smart-home, eco-freindly solutions, etc.

                The most recent real estate projects developed by IBB Immobilien GmbH: Franz-Rau Living in the town of Heusenstamm, completed in 2020; Buchrain Living in Offenbach am Main, a project whose development started in June 2021 and is expected to be completed in December 2022.',
            ],
            [
                'name' => 'IBB Imobiliare România S.R.L.',
                'adress' => 'Soseaua de Centura 48 A 077145, Pantelimon',
                'description-ro' => 'IBB IMOBILIARE face parte din grupul de companii IBB și desfășoară activități de dezvoltare imobiliară pe teritoriul României. În prezent, IBB Imobiliare este deținătorul și dezvoltatorul a două proiecte de mare amploare: iResidence în București Pipera cu peste 235 apartamente și spații comerciale și Sopor Cluj cu 500 apartamente.',
                'description-de' => 'Die IBB IMOBILIARE gehört zur IBB-Unternehmensgruppe und ist im Bereich der Immobilienentwicklung in Rumänien tätig. Derzeit ist die IBB Imobiliare Eigentümer und Entwickler von zwei Großprojekten: iResidence in Bukarest Pipera mit 520 Wohnungen und Gewerbeflächen und Sopor in Cluj, ebenfalls mit 500 Wohnungen.',
                'description-en' => 'IBB IMOBILIARE is part of the IBB group of companies and carries out real estate development activities in Romania. Currently, IBB Imobiliare is the owner and developer of two large-scale projects: iResidence in Bucharest Pipera with more than 235 apartments and commercial spaces and Sopor Cluj with 500 apartments.',
            ],
            [
                'name' => 'IBB Security & Protection',
                'adress' => 'Soseaua de Centura 48A B 077145, Pantelimon',
                'description-ro' => 'IBB SECURITY & PROTECTION face parte din grupul IBB, contribuind cu o gamă vitală de servicii din domeniul securității și pazei precum consultanță în vederea securizării optime a spațiilor private și comerciale, cât și montaj și instalare a sistemelor de securitate și echipamentelor de supraveghere video, etc.',
                'description-de' => 'Die IBB SECURITY & PROTECTION ist Teil der IBB-Gruppe und bietet ein umfangreiches Dienstleistungsangebot im Bereich von Sicherheit und Überwachung, wie z.B. Beratung zur optimalen Sicherung von privaten und gewerblichen Objekten, Installation und Montage von Sicherheitssystemen und Videoüberwachungsanlagen, usw.',
                'description-en' => 'IBB SECURITY & PROTECTION is part of the IBB group, contributing with a vital range of services in the field of security and guarding such as consultancy for the optimal security of private and commercial premises, as well as the installation of security systems and video surveillance equipment, etc.',
            ],
        ];

        DB::table('companies')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
