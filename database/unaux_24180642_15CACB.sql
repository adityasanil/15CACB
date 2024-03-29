-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 16, 2019 at 08:27 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `unaux_24180642_15CACB`
--

-- --------------------------------------------------------

--
-- Table structure for table `documentStore`
--

CREATE TABLE `documentStore` (
  `submitTime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `id` varchar(25) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dateRegistered` varchar(35) NOT NULL,
  `transactionDate` varchar(20) DEFAULT NULL,
  `identityUser` varchar(7) NOT NULL,
  `remarks` text,
  `partyName` varchar(15) NOT NULL,
  `ackNumber` varchar(30) NOT NULL,
  `trackingNumber` varchar(50) NOT NULL,
  `uidNumber` varchar(30) NOT NULL,
  `clientUploadedDoc` varchar(100) NOT NULL,
  `adminUploadedDoc` varchar(200) DEFAULT NULL,
  `taskStatus` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `process` varchar(10) NOT NULL,
  `clientUp15CA` varchar(100) DEFAULT NULL,
  `adminXML` varchar(200) DEFAULT NULL,
  `taskStatus15CA` varchar(30) DEFAULT NULL,
  `adminRemarks` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentStore`
--

INSERT INTO `documentStore` (`submitTime`, `id`, `firstName`, `lastName`, `fullName`, `userName`, `email`, `dateRegistered`, `transactionDate`, `identityUser`, `remarks`, `partyName`, `ackNumber`, `trackingNumber`, `uidNumber`, `clientUploadedDoc`, `adminUploadedDoc`, `taskStatus`, `contact`, `process`, `clientUp15CA`, `adminXML`, `taskStatus15CA`, `adminRemarks`) VALUES
('2019-08-13 14:21:11.627577', '74775d5276b1abef0', 'Sahil', 'Merchant', 'Sahil Merchant', 'sahil.s', 'aditya.sanil24@gmail.com', 'Tue, 13th Aug 2019 19:39', NULL, 'client', 'none', 'dell', '6328792', '19833213844', '6546235762', '../../uploads/Invoice-19833213844.png', '<a href=\'../../uploadsAdmin/15CB-19833213844.jpg\' download><i class=\'fas fa-download fa-lg\'></i></a>', '../../images/approved.svg', '8898493844', 'Completed', NULL, NULL, NULL, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `panNumber` varchar(20) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `gstNumber` varchar(20) NOT NULL,
  `ifscCode` varchar(20) NOT NULL,
  `swiftCode` varchar(25) NOT NULL,
  `accountNumber` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`id`, `username`, `identity`, `address`, `panNumber`, `companyName`, `gstNumber`, `ifscCode`, `swiftCode`, `accountNumber`) VALUES
('35515d3decea3ecf2', 'jigar.kt', 'admin', 'asdssad', '0000000000', '000000000000000000', '000000000000000', '00000000000', '00000000000', '00000000000000'),
('61255d4dbd59a6c8a', 'harsh.gori', 'client', 'Malad', '1111111111', 'Dell', '111111111111111', '11111111111', '11111111111', '11111111111111111111'),
('74775d5276b1abef0', 'sahil.s', 'client', 'malad', '1111111111', 'dell', '111111111111111', '1111111111', '1111111111', '1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(200) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `selectedOption` varchar(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `firstName`, `lastName`, `identity`, `selectedOption`, `title`, `content`, `image`, `date`, `timestamp`) VALUES
(1, 'Jigar', 'Thakkar', 'admin', 'Caselaw', 'I am an NRI. I have non-resident (ordinary) or NRO and non-resident (external) or NRE accounts in India. I need to transfer my savings from salary (all taxes paid) to Australia. Am I required to produ', '<p><strong></strong>Under the exchange control law, remittances outside India from NRE account is generally allowed. However, remittance outside India up to $1 million per financial year is allowed out of balances held in <a data-saferedirecturl=\"https://www.google.com/url?q=https://www.livemint.com/Money/whXx91dz6w7ogTBXkcMDvK/NRI-taxation-Global-income-is-taxed-in-India-for-tax-reside.html&source=gmail&ust=1564694082407000&usg=AFQjCNGnVj4JRtLZoUPC-NPRsgERWvwvQQ\" href=\"https://www.livemint.com/Money/whXx91dz6w7ogTBXkcMDvK/NRI-taxation-Global-income-is-taxed-in-India-for-tax-reside.html\" rel=\"noreferrer\" target=\"_blank\">NRO account</a> on submission of documentary evidence and certificate from a chartered accountant in the prescribed format. Remittance exceeding $1 million will require special permission from the Reserve Bank of India (RBI).Under the income-tax law, the remitter is required to furnish prescribed information electronically in Form 15CA (self-declaration) based on a certificate obtained from a chartered accountant in Form 15CB, wherever applicable, on any payments made to an NRI.However, no information is required to be furnished for the following payments which are not chargeable to income tax under the income tax law:(a) Payments made by an individual which does not require prior approval from RBI; or (b) Payments given in the specified list&mdash;linked to RBI codes.One of the payments mentioned in the specified list is &ldquo;S1301 - Remittance by non-residents towards family maintenance and savings&quot;. Assuming that you intend to transfer your savings for maintenance of family, there is no requirement to furnish Form 15CA/Form 15CB in terms of exemption granted under Rule 37BB(3)(ii) of Income Tax Rules 1962.However, in practice, some banks may insist for Form 15CA/Form 15CB and/or additional documents to substantiate that India income tax has been paid for the funds being remitted.&nbsp;</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/fractal.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:30:50'),
(2, 'Jigar', 'Thakkar', 'admin', 'Caselaw', ' Applicability of section 195A in cases of presumptive taxation (Section 44B, 44BB, 44BBB) is Not applicable - CIT vs ONGC [2003] 264 ITR 340 (Del HC)}; CIT vs ONGC [2005] 276 ITR 585)(Uttarakhand HC)', '<p><a data-saferedirecturl=\"https://www.google.com/url?q=https://indiankanoon.org/doc/1914659/&source=gmail&ust=1564694082407000&usg=AFQjCNFKZeRRjNbxf7N3UVnc26d4uTsLlQ\" href=\"https://indiankanoon.org/doc/1914659/\" rel=\"noreferrer\" target=\"_blank\">https://indiankanoon.org/doc/<wbr>1914659/</a>&nbsp;</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/skyscraper.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:34:13'),
(3, 'Jigar', 'Thakkar', 'admin', 'Caselaw', ' No grossing up u/s. 195A is required if tax is borne by the payer- Bosch Ltd (28 Taxmann.com 228 â€“ Bangalore ITAT)', '<p><a data-saferedirecturl=\"https://www.google.com/url?q=https://indiankanoon.org/doc/122068740/&source=gmail&ust=1564694082407000&usg=AFQjCNF35gq1Klr7_KRGWfwMPSzyj3bi-g\" href=\"https://indiankanoon.org/doc/122068740/\" rel=\"noreferrer\" target=\"_blank\">https://indiankanoon.org/doc/<wbr>122068740/</a>&nbsp;</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/career.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:35:13'),
(4, 'Jigar', 'Thakkar', 'admin', 'Caselaw', 'GE India Technology Centre P. Limited vs CIT & Others -193 Taxmann 234 (SC)', '<p>The Hon. Supreme Court in the case of GE India Technology Centre P. Limited vs CIT &amp; Others -193 Taxmann 234 (SC) observed that tax withholding is required only on the portion chargeable to tax and where a deductor is fairly certain that he can make his own determination of the sum chargeable, there is no bar under the law preventing him to make his own determination of income and his tax withholding liability. </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/light.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:36:37'),
(5, 'Jigar', 'Thakkar', 'admin', 'Caselaw', ' Formula One World Championship Ltd vs CIT Civil Appeal No. 3849 of 2017', '<p>Recently, the Hon. Supreme Court, though this issue was not a subject matter of appeal, in its decision in the case of Formula One World Championship Ltd vs CIT Civil Appeal No. 3849 of 2017 at Para 78 of the order while referring to the its own decision of GE India Technology Centre P. Limited vs CIT &amp; Others remarked that it would be for the AO to adjudicate how much business income is attributable to PE in India, which is chargeable to tax </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/fractal.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:38:47'),
(6, 'Jigar', 'Thakkar', 'admin', 'Rule', 'Basic Understanding ', '<p>There are certain compliances to make payments outside India, one of such compliance is submission of Form 15CA and 15CB.&nbsp;<strong>Rule 37BB&nbsp;</strong>defines the manner to furnish information in form 15CB and making declaration in form 15CA .&nbsp;<br><br></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/home.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:39:33'),
(7, 'Jigar', 'Thakkar', 'admin', 'Rule', 'What is 15 CA ?', '<p>All the information in respect of payments made to the Non-residents is furnished in 15CA making it a tool for collecting data about foreign remittances.&nbsp;This form essentially is a declaration used by the remitter for collecting information on payments chargeable.&nbsp;</p><p><span lang=\"EN\">Thus, form 15CA helps the IT department of the country keep a track of foreign remittances and their taxability.</span></p><p>Form 15CA will be NOT be required to be furnished by an individual for remittance, which does not require RBI approval.&nbsp;</p><p><br></p><p>Form 15CA has 4 parts as mentioned below. Depending on amount and taxability of remittance, specific parts of Form 15CA needs to be filled:</p><ul><li>Part A - If remittance is taxable and the total value of such remittance or remittances during the Financial Year is less than Rs. 5 lakh</li><li>Part B - If order/ certificate u/s 195(2)/195(3)/197 of Income-tax Act has been obtained from the Assessing Officer</li><li>Part C&nbsp;- If remittance is taxable and the total value of such remittance or remittances during the Financial Year is more than Rs. 5 lakh and a certificate in Form No. 15CB from an accountant as defined in the explanation below sub-section (2) of section 288 has been obtained.</li><li>Part D&nbsp;- To be filled up if the remittance is not taxable other than payments referred to in rule 37BB(3) by the person referred to in rule 37BB(2).</li></ul><p><br></p><p><br></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/sunrise.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:40:46'),
(8, 'Jigar', 'Thakkar', 'admin', 'Rule', ' What is 15CB ?', '<p>This certificate is required only when the remittance is not chargeable to tax. It is a channel of obtaining tax clearance.&nbsp;This form essentially is a declaration used by the remitter for collecting information on payments chargeable.&nbsp;</p><p><span lang=\"EN\">&nbsp;</span><span lang=\"EN\">On the other hand form, 15CB is a certificate from a CA which acts as an alternative channel for obtaining tax clearance.&nbsp;</span><span lang=\"EN\">&nbsp;</span><span lang=\"EN\">Form No. 15CB will only be required for payments made to non-residents, which are taxable and if the payment exceeds Rs. 5 lakhs.</span></p><p>Form 15CB will be NOT be required to be furnished by an individual for remittance, which does not require RBI approval</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/globe-2491989_1920.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:41:45'),
(9, 'Jigar', 'Thakkar', 'admin', 'Rule', 'What is Rule 37BB ?', '<p>List of payments of specified nature are mentioned in Rule 37BB, which do not require the submission of Forms 15CA and 15CB, has been expanded from 28 to 33 from April 1, 2016 including payments for imports.</p><p><br></p><table><tbody><tr><td>Sl. No.</td><td>Nature of Payment</td></tr><tr><td>1</td><td>Indian investment abroad -in equity capital (shares)</td></tr><tr><td>2</td><td>Indian investment abroad -in debt securities</td></tr><tr><td>3</td><td>Indian investment abroad-in branches and wholly owned subsidiaries</td></tr><tr><td>4</td><td>Indian investment abroad -in subsidiaries and associates</td></tr><tr><td>5</td><td>Indian investment abroad -in real estate</td></tr><tr><td>6</td><td>Loans extended to Non-Residents</td></tr><tr><td>7</td><td>Advance payment against imports</td></tr><tr><td>8</td><td>Payment towards imports-settlement of invoice</td></tr><tr><td>9</td><td>Imports by diplomatic missions</td></tr><tr><td>10</td><td>Intermediary trade</td></tr><tr><td>11</td><td>Imports below Rs.5,00,000-(For use by ECD offices)</td></tr><tr><td>12</td><td>Payment- for operating expenses of Indian shipping companies operating abroad.</td></tr><tr><td>13</td><td>Operating expenses of Indian Airlines companies operating abroad</td></tr><tr><td>14</td><td>Booking of passages abroad -Airlines companies</td></tr><tr><td>15</td><td>Remittance towards business travel.</td></tr><tr><td>16</td><td>Travel under basic travel quota (BTQ)</td></tr><tr><td>17</td><td>Travel for pilgrimage</td></tr><tr><td>18</td><td>Travel for medical treatment</td></tr><tr><td>19</td><td>Travel for education (including fees, hostel expenses etc.)</td></tr><tr><td>20</td><td>Postal Services</td></tr><tr><td>21</td><td>Construction of projects abroad by Indian companies including import of goods at project site</td></tr><tr><td>22</td><td>Freight insurance - relating to import and export of goods</td></tr><tr><td>23</td><td>Payments for maintenance of offices abroad</td></tr><tr><td>24</td><td>Maintenance of Indian embassies abroad</td></tr><tr><td>25</td><td>Remittances by foreign embassies in India</td></tr><tr><td>26</td><td>Remittance by non-residents towards family maintenance and-savings</td></tr><tr><td>27</td><td>Remittance towards personal gifts and donations</td></tr><tr><td>28</td><td>Remittance towards donations to religious and charitable institutions abroad</td></tr><tr><td>29</td><td>Remittance towards grants and donations to other Governments and charitable institutions established by the Governments.</td></tr><tr><td>30</td><td>30 Contributions or donations by the Government to international institutions</td></tr><tr><td>31</td><td>Remittance towards payment or refund of taxes.</td></tr><tr><td>32</td><td>Refunds or rebates or reduction in invoice value on account of exports</td></tr><tr><td>33</td><td>Payments by residents for international bidding.</td></tr></tbody></table><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/fun.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:42:37'),
(12, 'Jigar', 'Thakkar', 'admin', 'Rule', 'What is DTAA?', '<p>The DTAA means the Double Taxation Avoidance Agreement. This concept concentrates on avoiding overlapping taxes when it comes to paying taxes in two different countries. Thus for example when one Indian Resident also works in Singapore, due to some reasons he/she may have to pay taxes in Singapore as well. To avoid payment of taxation in both the countries for a common purpose he/she must follow the DTAA. This can be applied to a person or a company.&nbsp;</p><p>Any Indian Resident who is a person as specified under the income tax act 1961 or any resident of a DTAA affiliated country gets benefited under the DTAA.</p><p>There are two types of DTAA&rsquo;s:</p><p>â—Unlimited DTAA</p><p><br></p><p>â—Limited DTAA</p><p><br></p><p>In total India forms the DTAA with 71 countries in terms of unlimited DTAA&rsquo;s and in terms of limited DTAA&rsquo;s taxpayers benefit only from 16 countries.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/deathValley.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:42:42'),
(11, 'Jigar', 'Thakkar', 'admin', 'Rule', 'What is limited DTAA?  What countries does India hold limited DTAA with?', '<p>Indian Residents can benefit from the limited DTAA on only certain types of incomes from the following countries:</p><p>1.Afghanistan</p><p>2. Bulgaria&nbsp;</p><p>3. Czechoslovakia&nbsp;</p><p>4. Ethiopia&nbsp;</p><p>5. Iran&nbsp;</p><p>6. Kuwait&nbsp;</p><p>7. Lebanon&nbsp;</p><p>8. Oman&nbsp;</p><p>9. Pakistan&nbsp;</p><p>10. People&#39;s Democratic Republic of Yemen&nbsp;</p><p>11. Russian Federation&nbsp;</p><p>12. Saudi Arabia&nbsp;</p><p>13. Switzerland&nbsp;</p><p>14. UAE&nbsp;</p><p>15. Uganda&nbsp;</p><p>16. Yemen Arab Republic</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/northernlights.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:42:45'),
(10, 'Jigar', 'Thakkar', 'admin', 'Rule', 'How do you decide whether Form 15CB or Form 15CA is required ?', '<p>Step 1: First and foremost one must decide if the payment made is taxable.</p><p>Step 2: If the first step holds true then figure out if the amount exceeds R/s 5,00,000.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Or</p><p>The aggregate payment to the Non-resident if below R/s 2,50,000 in the year.</p><p>Step 3: If all of the above points hold true, then fill form 15CA Part A only and remit.</p><p>Step 4: If a single payment is more than R/s 5 lakhs or the aggregate more than 2,50,000 R/s then you must approach a CA and get form 15CB filed and submitted.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/ancient-2179091_1920.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:42:40'),
(13, 'Jigar', 'Thakkar', 'admin', 'Rule', 'What is the reason behind the introduction of 15CA and 15CB?', '<p>â—The main reason for the introduction for such a form is that banks need to keep a track of the remittances made outside the country and to the people or institutions they are made to.</p><p>â—Also, there are many such circumstances where you do not need to submit these forms.</p><p>â—Furthermore, foreign remittances have tax implications that are often neglected.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '../../images/blogs/lightbulb.jpeg', 'Wed, 31st Jul 2019', '2019-07-31 21:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` varchar(20) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identity` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `addedBy` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `firstName`, `lastName`, `userName`, `password`, `identity`, `email`, `contact`, `addedBy`) VALUES
('35515d3decea3ecf2', 'Jigar', 'Thakkar', 'jigar.kt', '$2y$10$PdzSLnc2b9SA11wLHahnze5nhRqwvLINN.Bj/9xi7rxE.yB/hWh5W', 'admin', 'jigar.kt@somaiya.edu', '9819393237', 'Root'),
('61255d4dbd59a6c8a', 'Harsh', 'Gori', 'harsh.gori', '$2y$10$UtPC1pXko30U5ZVzabFQoen3vo38kG0ZmizDsQMej3d9h3n4k43fq', 'client', 'harsh@gmail.com', '8898493855', ''),
('22935d4f13dd3b26d', 'Aditya', 'Sanil', 'aditya.sanil', '$2y$10$ZwoCXI.apjSAW0mw8xkPq.Ndkj2ewZdgZSKr/Yj5vSULcm2cKgHgS', 'admin', 'aditya.sanil@somaiya.edu', '7666003731', 'jigar.kt'),
('74775d5276b1abef0', 'Sahil', 'Merchant', 'sahil.s', '$2y$10$twWfuU2ImZvAUfxdzZsOgO7jKMxFhIv0ePnNN4gkRJUCSItAuC4DG', 'client', 'aditya.sanil24@gmail.com', '8898493844', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documentStore`
--
ALTER TABLE `documentStore`
  ADD PRIMARY KEY (`trackingNumber`),
  ADD UNIQUE KEY `trackingNumber` (`trackingNumber`);

--
-- Indexes for table `personaldetails`
--
ALTER TABLE `personaldetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
