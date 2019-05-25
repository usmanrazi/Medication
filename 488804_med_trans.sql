-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: mysql51-039.wc2:3306
-- Generation Time: Nov 05, 2013 at 04:35 AM
-- Server version: 5.1.70
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `488804_med_trans`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `classification` text NOT NULL,
  `uses` text NOT NULL,
  `side_effects` text NOT NULL,
  `precausions` text NOT NULL,
  `interactions` text NOT NULL,
  `contraindictions` text NOT NULL,
  `pregnancy` text NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`m_id`, `classification`, `uses`, `side_effects`, `precausions`, `interactions`, `contraindictions`, `pregnancy`) VALUES
(1, 'nonsteroidal anti-inflammatory', 'Pain reliever/fever reducer', 'hives,facial swelling,asthma (wheezing),shock,skin reddening,rash,blister     ', 'Ibuprofen may cause a severe allergic reaction, especially in people allergic to aspirin.', '', 'do not take more than directed,the smallest effective dose should be used,do not take longer than 10 days, unless directed by a doctor (see Warnings),Refer to the product container for additional directions', 'Ask your doctor.'),
(2, 'Analgesic', 'Temporarily reduces fever and relieves minor aches, pains, and headache.', '', 'Severe liver damage may occur if used more than the recommended daily dose,Caution with liver disease and in patients taking warfarin ', 'Avoid with any other APAP-containing drugs', '', 'Safety not known in pregnancy/nursing.'),
(3, 'Antihistamine', 'For amelioration of allergic reactions to blood or plasma, in anaphylaxis as an adjunct to epinephrine ,and other standard measures after the acute symptoms have been controlled and for other uncomplicated allergic conditions of the immediate type', 'Sedation, sleepiness, dizziness,disturbed coordination, epigastric distress,thickening of bronchial secretions, drug rash,hypotension, hemolytic anemia, urinary frequency,headache,photosensitivity,agranulocytosis,insomnia,anorexia', 'Caution with narrow-angle glaucoma, stenosing peptic ulcer, pyloroduodenal obstruction, symptomatic prostatic hypertrophy, or bladder-neck obstruction.\r\n May cause hallucinations, convulsions, or death in pediatrics, especially, in overdosage.\r\nMay produce excitation and may diminish mental alertness in pediatrics. Increased risk of dizziness, sedation, and hypotension in elderly. \r\nCaution with a history of bronchial asthma, increased intraocular pressure (IOP), hyperthyroidism, lower respiratory disease (eg, asthma), cardiovascular disease (CVD), or HTN. ', 'Additive effects with alcohol and other CNS depressants (hypnotics, sedatives, tranquilizers).\r\n MAOIs prolong and intensify anticholinergic effects.', 'Neonates,premature infants,nursing,use as a local anesthetic.', 'Category B, contraindicated in nursing.'),
(4, 'Antidiarrheal', 'Control and symptomatic relief of acute nonspecific diarrhea and chronic diarrhea.\r\nReduce the discharge volume from ileostomies.', 'Constipation, nausea,abdominal cramps', 'Caution in young children; dehydration may influence variability of response to the drug.\r\nExtremely rare allergic reactions, including anaphylaxis and anaphylactic shock, reported.\r\nIn acute diarrhea, Discontinue therapy if no improvement is observed in 48 hrs.\r\nCaution with hepatic impairment; monitor closely for signs of CNS toxicity.', '', 'Infants <24 months of age and patients with abdominal pain in the absence of diarrhea.', 'Category C, not for use in nursing.'),
(5, 'Corticosteroid', 'Relief of the inflammatory and pruritic manifestations of corticosteroid-responsive ', 'Burning, itching, irritation, dryness, folliculitis, hypertrichosis, acneiform eruptions,hypopigmentation,perioral dermatitis,allergic contact dermatitis,maceration of the skin,secondary infection, skin atrophy, striae,miliaria', 'Systemic absorption may produce reversible hypothalamic-pituitary-adrenal (HPA) axis suppression, manifestations of Cushing''s syndrome, hyperglycemia, and glucosuria.\r\nWithdraw treatment, reduce frequency of application, or substitute with a less potent steroid if HPA axis suppression is noted. \r\nSigns and symptoms of steroid withdrawal may occur requiring supplemental systemic corticosteroids. Discontinue and institute appropriate therapy if irritation occurs. \r\nUse appropriate antifungal or antibacterial agent in the presence of dermatological infections; if favorable response does not occur promptly, Discontinue until infection is controlled.\r\nPediatrics may be more susceptible to systemic toxicity. Chronic therapy may interfere with the growth and development of pediatric patients.', '', '', 'Category C, caution in nursing'),
(6, 'Opioid analgesic', 'Relief of moderate to moderately severe pain.', 'Acute liver failure.lightheadedness, dizziness, sedation,Nausia and Vomiting\r\n', 'Increased risk of acute liver failure in patients with underlying liver disease. \r\nHypersensitivity and anaphylaxis reported; Discontinue if signs/symptoms occur. \r\nMay produce dose-related respiratory depression, and irregular and periodic breathing.\r\n Respiratory depressant effects and CSF pressure elevation capacity may be markedly exaggerated in the presence of head injury. X\r\nMay obscure diagnosis or clinical course of head injuries or acute abdominal conditions. \r\nPotential for abuse. \r\nCaution with hypothyroidism, Addison''s disease, prostatic hypertrophy, urethral stricture, severe hepatic/renal impairment, or in elderly/debilitated. \r\nSuppresses the cough reflex; caution with pulmonary disease and in postoperative use. \r\nPhysical dependence and tolerance may develop.', 'Additive CNS depression with other narcotics, antihistamines, antipsychotics, antianxiety agents, or other CNS depressants (eg, alcohol); reduce dose of one or both agents. \r\nConcomitant use with MAOIs or TCAs may increase the effect of either the antidepressant or hydrocodone.\r\n Increased risk of acute liver failure with alcohol ingestion.', '', 'Category C, not for use in nursing'),
(7, 'ACE inhibitor', 'Treatment of HTN alone as initial therapy or concomitantly with other classes of antihypertensive agents. \r\nAdjunctive therapy in the management of heart failure (HF) if inadequately responding to diuretics and digitalis.\r\nTreatment of hemodynamically stable patients within 24 hrs of acute myocardial infarction (AMI), to improve survival.', 'Hypotension,dizziness,headache,diarrhea,cough,chest pain,hyperkalemia', 'Not recommended in pediatric patients with GFR <30mL/min/1.73m2. \r\nHead/neck angioedema reported; Discontinue and administer appropriate therapy.\r\n Intestinal angioedema reported; monitor for abdominal pain. \r\nMore reports of angioedema in blacks than nonblacks. \r\nMay cause changes in renal function.\r\nMay increase BUN and SrCr in patients with renal artery stenosis or with no preexisting renal vascular disease.\r\nHyperkalemia and persistent nonproductive cough reported.\r\n Hypotension may occur with major surgery or during anesthesia.\r\nCaution in elderly.', '', '', 'Category D, not for use in nursing.'),
(8, 'Macrolide', 'Treatment of mild to moderate community-acquired pneumonia in adults and children ?6 months.\r\nAcute bacterial sinusitis in adults caused by susceptible bacteria.', 'Diarrhea/loose stool,Nausia and Vomiting,abdominal pain,headache,rash', 'Serious allergic reactions (eg, angioedema, anaphylaxis, Stevens-Johnson syndrome [SJS], and toxic epidermal necrolysis) reported. \r\nAbnormal liver function, hepatitis, cholestatic jaundice, hepatic necrosis and hepatic failure reported; Discontinue therapy immediately if signs and symptoms of hepatitis occur. \r\nClostridium difficile-associated diarrhea (CDAD) reported. \r\nExacerbation of symptoms of myasthenia gravis and new onset of myasthenic syndrome reported.\r\n Prolonged cardiac repolarization and QT interval, and torsades de pointes reported. \r\nMay increase risk of bacterial resistance with use in the absence of a proven/suspected bacterial infection. ', 'Avoid in patients receiving Class IA (quinidine, procainamide) or Class III (dofetilide, amiodarone, sotalol) antiarrhythmic agents.\r\nMay potentiate the effects of oral anticoagulants (eg, warfarin); monitor PT. \r\nNelfinavir may increase area under the curve and Cmax. \r\nMonitor carefully with digoxin, ergotamine or dihydroergotamine, cyclosporine, hexobarbital, and phenytoin.', 'History of cholestatic jaundice/hepatic dysfunction associated with prior use of azithromycin.', 'Category B, caution in nursing.'),
(9, 'Biguanide', 'Adjunct to diet and exercise to improve glycemic control in type 2 DM.', 'Lactic acidosis,diarrhea,Nausia and Vomiting,flatulence,asthenia,abdominal discomfort,hypoglycemia,dizziness,dyspnea,taste disorder,chest discomfort,flu syndrome,palpitations,indigestion', 'Discontinue therapy if conditions associated with lactic acidosis and characterized by hypoxemia states (eg, acute CHF, cardiovascular [CV] collapse, acute myocardial infarction [MI]) or prerenal azotemia develop.\r\nDiscontinue therapy if temporary loss of glycemic control occurs due to stress; temporarily give insulin and reinstitute after acute episode is resolved. \r\nMay decrease serum vitamin B12 levels.\r\nIncreased risk of hypoglycemia in elderly, debilitated/malnourished, with adrenal or pituitary insufficiency, or alcohol intoxication.\r\nConsider therapeutic alternatives, including initiation of insulin, if secondary failure occurs.\r\nCaution in elderly.', 'May increase levels with furosemide, nifedipine, cimetidine, cationic drugs (eg, digoxin, amiloride, procainamide, quinidine, quinine, ranitidine, trimethoprim, vancomycin, triamterene, morphine). \r\nObserve for loss of glycemic control with thiazides, other diuretics, corticosteroids, phenothiazines, thyroid products, estrogens, oral contraceptives, phenytoin, nicotinic acid, sympathomimetics, calcium channel blockers, and isoniazid. \r\nMay interact with highly protein-bound drugs (eg, salicylates, sulfonamides, chloramphenicol, probenecid). May decrease furosemide, glyburide levels. \r\nCaution with drugs that may affect renal function or result in significant hemodynamic change or may interfere with the disposition of metformin. \r\nHypoglycemia may occur with concomitant use of other glucose-lowering agents (eg, sulfonylureas, insulin). \r\nMay overlap drug effects when transferred from chlorpropamide. .\r\nHypoglycemia may be difficult to recognize with ?-adrenergic blocking drugs.', 'Renal disease/dysfunction.\r\nacute or chronic metabolic acidosis.\r\ndiabetic ketoacidosis with or without coma.', 'Category B, not for use in nursing.'),
(10, 'Thiazide diuretic', 'Management of HTN alone or in combination with other antihypertensives, and edema in pregnancy due to pathologic causes. \r\n Adjunct therapy in edema associated with congestive heart failure, hepatic cirrhosis, corticosteroid and estrogen therapy, and renal dysfunction.', 'Weakness,hypotension (including orthostatic hypotension),pancreatitis,jaundice,diarrhea,vomiting,blood dyscrasias,rash,photosensitivity,electrolyte imbalance,impotence,renal dysfunction/failure,interstitial nephritis', 'Caution with severe renal disease.\r\n May precipitate azotemia and cumulative effects may develop with impaired renal function.\r\n Caution with impaired hepatic function or progressive liver disease; may precipitate hepatic coma.\r\n May cause idiosyncratic reaction, resulting in acute transient myopia and acute angle-closure glaucoma; Discontinue as rapidly as possible.\r\n Fluid or electrolyte imbalance (eg, hyponatremia, hypochloremic alkalosis, hypokalemia, hypomagnesemia) may develop; monitor serum electrolytes periodically. \r\nHypokalemia may develop, especially with brisk diuresis, with severe cirrhosis, or after prolonged therapy; may use K+-sparing diuretics, K+ supplements, or foods high in K+ to avoid or treat hypokalemia.\r\nDilutional hyponatremia may occur in edematous patients in hot weather; appropriate therapy of water restriction rather than salt administration should be instituted except for life-threatening hyponatremia.\r\n Hyperglycemia may occur.\r\nLatent diabetes mellitus (DM) may manifest', 'Potentiation of orthostatic hypotension may occur with alcohol, barbiturates, and narcotics. \r\nDosage adjustment of antidiabetic drugs (insulin or oral hypoglycemic agents) may be required. \r\nMay potentiate or have an additive effect with other antihypertensives. \r\nCholestyramine and colestipol resins may reduce absorption. Intensified electrolyte depletion, particularly hypokalemia, with concomitant corticosteroids and adrenocorticotropic hormone use. \r\nMay decrease response to pressor amines (eg, norepinephrine). May increase responsiveness to nondepolarizing skeletal muscle relaxants (eg, tubocurarine).\r\nIncreased risk of lithium toxicity; avoid concomitant use.\r\nNSAIDs may reduce diuretic, natriuretic, and antihypertensive effects. \r\nHypokalemia and hypomagnesemia may sensitize or exaggerate the response of the heart to toxic effects of digitalis.', '', 'Category B, not for use in nursing.');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_region`
--

CREATE TABLE IF NOT EXISTS `medicine_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `m_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `medicine_region`
--

INSERT INTO `medicine_region` (`id`, `m_id`, `r_id`, `m_name`) VALUES
(1, 1, 1, 'Ibuprofen'),
(2, 1, 2, 'Anadin'),
(3, 1, 2, 'Cuprofen'),
(4, 1, 2, 'Nurofen Migrane'),
(5, 1, 2, 'Solpadeine'),
(6, 1, 2, 'Ibucalm'),
(7, 1, 3, 'Anadvil Efe'),
(9, 1, 3, 'Arfen'),
(10, 1, 3, 'Baroc'),
(11, 1, 3, 'Brufen Retard'),
(12, 1, 3, 'Brufen Suspensao '),
(13, 1, 3, 'Dolocyl'),
(14, 1, 3, 'Dolomate 200'),
(15, 1, 3, ' Faspic 200'),
(16, 1, 3, 'Fenpic'),
(17, 1, 3, 'Frenidor'),
(18, 1, 3, 'Ifenin'),
(19, 1, 3, 'Kifen'),
(20, 1, 3, 'Liderfen'),
(21, 1, 3, 'Moment'),
(22, 1, 4, 'ADCO-Ibuprofen'),
(23, 1, 4, 'ibrufen'),
(24, 1, 5, 'Eve'),
(25, 2, 1, 'Acetaminophen'),
(26, 2, 2, 'Paracetamol'),
(27, 2, 3, 'dafalgan'),
(28, 2, 3, 'Xumadol'),
(29, 2, 4, 'A_Set'),
(30, 2, 5, 'Tylenol'),
(31, 3, 1, 'Diphenhydramine '),
(32, 3, 2, 'Nytol for sleep'),
(33, 3, 3, 'Benaderma'),
(34, 3, 3, 'Bernergina'),
(35, 3, 3, 'Benetussin'),
(36, 3, 3, 'Benlin'),
(37, 3, 3, 'Benylin'),
(38, 3, 4, 'Benylin'),
(39, 3, 5, 'DREWELL for sleep'),
(40, 4, 1, 'Loperamide '),
(41, 4, 2, 'Immodium'),
(42, 4, 3, 'Dyspagon'),
(43, 4, 3, 'Imodium'),
(44, 4, 3, 'Loperamida Generis'),
(45, 4, 3, 'Loperamida mylan'),
(46, 4, 3, 'Lopitum'),
(47, 4, 3, 'Loride'),
(48, 4, 3, 'Diareze'),
(49, 4, 4, 'Norimode'),
(50, 4, 5, 'Beltessa'),
(51, 5, 1, 'Hydrocortisone'),
(52, 5, 2, 'HC45'),
(53, 5, 2, 'Canesten'),
(54, 5, 2, 'Daktacort'),
(55, 5, 2, 'Dermacort'),
(56, 5, 2, 'Eurax'),
(57, 5, 2, 'Lanacort'),
(58, 5, 3, 'Colifoam'),
(59, 5, 3, 'Hidalone'),
(60, 5, 3, 'Lactisota'),
(61, 5, 3, 'Locoid'),
(62, 5, 4, 'Ciprobay HC'),
(63, 5, 5, 'Hydrocortizone'),
(64, 6, 1, 'Hydrocodone '),
(65, 6, 2, 'Dihydrocodeine (Illegal in the UK.)'),
(68, 6, 3, 'Dihydrocodeine (Illegal in most of the Eurozone,)'),
(69, 6, 4, 'Myprodol'),
(70, 6, 5, 'dihydrocodeine'),
(71, 7, 1, 'Lisinopril '),
(72, 7, 2, 'Zestril'),
(73, 7, 2, 'Lisinopril'),
(74, 7, 3, 'Ecapril'),
(75, 7, 3, 'Lipril'),
(76, 7, 3, 'Lisinopril Angenerico'),
(77, 7, 4, 'Adco-Zetomax CO'),
(78, 7, 5, 'Arrow-Lisinopril '),
(79, 8, 1, 'azithromycin'),
(80, 8, 2, 'azithromycin'),
(81, 8, 3, 'Azitrix'),
(82, 8, 3, 'Azyter'),
(83, 8, 3, 'Neofarmiz'),
(84, 8, 3, 'Zithromax'),
(85, 8, 4, 'Aspen Azithromycin'),
(86, 8, 5, 'azithromycin'),
(87, 9, 1, 'metformin'),
(88, 9, 2, 'Bolamyn SR tablets.'),
(89, 9, 2, 'Glucient SR tablets.'),
(90, 9, 2, 'Metabet SR tablets.'),
(91, 9, 2, 'Glucophage'),
(92, 9, 2, 'Metformin'),
(93, 9, 3, 'Competact'),
(94, 9, 3, 'Efficib'),
(95, 9, 3, 'Eucreas'),
(96, 9, 3, 'Glubrava'),
(97, 9, 3, 'Glucophage'),
(98, 10, 1, 'Hydrochlorothiazide '),
(99, 10, 2, 'Hydrochlorothiazide '),
(100, 10, 3, 'Actelsar HCT'),
(101, 10, 3, ' CoAprovel'),
(102, 10, 3, 'Copalia HCT '),
(103, 10, 3, 'Dafiro HCT'),
(104, 10, 4, 'Accuretic'),
(105, 10, 5, 'Co-Dio EX');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `password`) VALUES
(3, 'usman.razi1@gmail.com', '12345'),
(5, 'test@gmail.com', '12345'),
(6, 'admin@yahoo.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`r_id`, `r_name`) VALUES
(1, 'USA'),
(2, 'UK'),
(3, 'EURO-ZONE'),
(4, 'SOUTH AFRICAN'),
(5, 'JAPANESE');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `save_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `member_id`, `medicine_name`, `region_name`, `save_time`) VALUES
(6, 3, 'Baroc', 'UK', '2013-11-04 09:05:29'),
(7, 3, 'Baroc', 'EURO-ZONE', '2013-11-04 09:07:18'),
(8, 3, 'Lisinopril', 'UK', '2013-11-04 09:17:21'),
(9, 5, 'Accuretic', 'SOUTH AFRICAN', '2013-11-04 09:46:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
