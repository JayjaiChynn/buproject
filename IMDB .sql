-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 02, 2022 at 09:56 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IMDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `first_name`, `last_name`, `gender`, `nationality`, `birth_date`) VALUES
(1, 'Adam', 'McKay', 'male', 'American', '1968-04-17'),
(3, 'Cate ', 'Shortland', 'female', 'Australian', '1968-08-10'),
(4, 'Corin', 'Hardy', 'male', 'English', '1975-01-06'),
(5, 'Chloé ', 'Zhao', 'female', 'Chinese', '1982-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `poster` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `poster`, `release_date`, `director_id`) VALUES
(1, 'Don\'t Look Up', 'Kate Dibiasky (Jennifer Lawrence), an astronomy grad student, and her professor Dr. Randall Mindy (Leonardo DiCaprio) make an astounding discovery of a comet orbiting within the solar system. The problem — it’s on a direct collision course with Earth. The other problem? No one really seems to care. Turns out warning mankind about a planet-killer the size of Mount Everest is an inconvenient fact to navigate. With the help of Dr. Oglethorpe (Rob Morgan), Kate and Randall embark on a media tour that takes them from the office of an indifferent President Orlean (Meryl Streep) and her sycophantic son and Chief of Staff, Jason (Jonah Hill), to the airwaves of The Daily Rip, an upbeat morning show hosted by Brie (Cate Blanchett) and Jack (Tyler Perry). With only six months until the comet makes impact, managing the 24-hour news cycle and gaining the attention of the social media obsessed public before it’s too late proves shockingly comical — what will it take to get the world to just look up?!\r\nDON’T LOOK UP is written and directed by Academy Award winner Adam McKay (The Big Short) and also stars Mark Rylance, Ron Perlman, Timothée Chalamet, Ariana Grande, Scott Mescudi (aka Kid Cudi), Himesh Patel, Melanie Lynskey, Michael Chiklis and Tomer Sisley.', '', '2021-12-10', 1),
(2, 'Daddy\'s Home', 'Daddy\'s Home is a 2015 American comedy film directed by Sean Anders and written by Anders, Brian Burns, and John Morris.[4] The film is about a mild-mannered stepfather (Will Ferrell) who vies for the attention of his wife\'s (Linda Cardellini) children when their biological father (Mark Wahlberg) returns.\r\n\r\nThe second collaboration between Ferrell and Wahlberg following the 2010 film The Other Guys, principal photography began on November 17, 2014 in New Orleans, Louisiana. The film was released on December 25, 2015, by Paramount Pictures and grossed $242 million worldwide, becoming Ferrell\'s highest-grossing live-action film. It has a 31% approval rating on Rotten Tomatoes, which criticizes the lack of funny ideas and not fully exploring the premise.[5] A sequel, Daddy\'s Home 2, was released on November 10, 2017.', '', '2015-12-09', 1),
(3, 'Black Widow', 'Black Widow is a 2021 American superhero film based on Marvel Comics featuring the character of the same name. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the 24th film in the Marvel Cinematic Universe (MCU). The film was directed by Cate Shortland from a screenplay by Eric Pearson, and stars Scarlett Johansson as Natasha Romanoff / Black Widow alongside Florence Pugh, David Harbour, O-T Fagbenle, Olga Kurylenko, William Hurt, Ray Winstone, and Rachel Weisz. Set after the events of Captain America: Civil War (2016), the film sees Romanoff on the run and forced to confront her past.\r\n\r\nLionsgate Films began developing a Black Widow film in April 2004, with David Hayter attached to write and direct. The project did not move forward and the character\'s film rights had reverted to Marvel Studios by June 2006. Johansson was cast in the role for several MCU films beginning with Iron Man 2 (2010), and began discussing a solo film with Marvel. Work began in late 2017, with Shortland hired in 2018. Jac Schaeffer and Ned Benson contributed to the script before Pearson was hired. Filming took place from May to October 2019 in Norway, Budapest, Morocco, Pinewood Studios in England, and in Atlanta, Macon, and Rome, Georgia.', '', '2021-06-29', 3),
(4, 'The Nun', 'The Nun (stylized as THE NUИ) is a 2018 American gothic supernatural horror film directed by Corin Hardy and written by Gary Dauberman, from a story by Dauberman and James Wan.[2][3] It is a spin-off/prequel of 2016\'s The Conjuring 2 and the fifth installment in The Conjuring Universe franchise. The film stars Taissa Farmiga, Demián Bichir and Jonas Bloquet, with Bonnie Aarons reprising her role as the Demon Nun, an incarnation of Valak, from The Conjuring 2. The plot follows a Roman Catholic priest and a nun in her novitiate as they uncover an unholy secret in 1952 Romania.', '', '2018-09-04', 4),
(5, 'Eternals', 'Eternals is a 2021 American superhero film based on the Marvel Comics race of the same name. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the 26th film in the Marvel Cinematic Universe (MCU). The film is directed by Chloé Zhao, who wrote the screenplay with Patrick Burleigh, Ryan Firpo, and Kaz Firpo. It stars an ensemble cast including Gemma Chan, Richard Madden, Kumail Nanjiani, Lia McHugh, Brian Tyree Henry, Lauren Ridloff, Barry Keoghan, Don Lee, Harish Patel, Kit Harington, Salma Hayek, and Angelina Jolie. In the film, the Eternals, immortal alien beings, emerge from hiding after thousands of years to protect Earth from their ancient counterparts, the Deviants.\r\n\r\nIn April 2018, Marvel Studios president Kevin Feige announced that a film based on the Eternals had begun development, with Ryan and Kaz Firpo hired to write the script in May. Zhao was set to direct the film by late September, and was given significant creative freedom with the film, which resulted in filming on location more than previous MCU films. Zhao rewrote the screenplay, to which Burleigh was later reported to have also contributed. Principal photography took place from July 2019 to February 2020, at Pinewood Studios as well as on location in London and Oxford, England, and in the Canary Islands.', '', '2021-11-05', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
