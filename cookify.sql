DROP DATABASE IF EXISTS cookify;
CREATE DATABASE cookify;
USE cookify;

CREATE TABLE pays (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    image VARCHAR(255),
    description TEXT
);

CREATE TABLE type (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    mot_de_passe VARCHAR(255)
);

CREATE TABLE recette (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    description TEXT,
    preparation TEXT,
    image VARCHAR(255),
    ingredients TEXT,
    temps_preparation INT,
    temps_cuisson INT,
    temps_total INT,
    accessoires TEXT,
    id_pays INT NOT NULL,
    id_type INT NOT NULL,
    FOREIGN KEY (id_pays) REFERENCES pays(id),
    FOREIGN KEY (id_type) REFERENCES type(id)
);

CREATE TABLE livre (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    auteur VARCHAR(255),
    resume text,
    nombre_page INT,
    lien_image varchar (255),
    lien_telecharger VARCHAR(255),
    annee_publication YEAR
);

CREATE TABLE recette_favori (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_recette INT NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_recette) REFERENCES recette(id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE livre_favori (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_livre INT NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_livre) REFERENCES livre(id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE commentaire (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_recette INT NOT NULL,
    id_utilisateur INT NOT NULL,
    contenu varchar(255),
    FOREIGN KEY (id_recette) REFERENCES recette(id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE categorie_question (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    description TEXT,
    image VARCHAR(255)
);

CREATE TABLE questions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_categorie INT NOT NULL, 
    question TEXT,
    FOREIGN KEY (id_categorie) REFERENCES categorie_question(id)
);

CREATE TABLE reponse_proposition (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_question INT NOT NULL,
    proposition text,
    est_correcte text, 
    FOREIGN KEY (id_question) REFERENCES questions(id)
);

CREATE TABLE reponse_utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_question INT NOT NULL,
    id_reponse_proposition INT NOT NULL, 
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_question) REFERENCES questions(id),
    FOREIGN KEY (id_reponse_proposition) REFERENCES reponse_proposition(id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
);

create table session_jeu(
    id int primary key auto_increment,
    session_code int not null,
    creator_id int not null,
    status enum("en_attente","prete","termine")DEFAULT 'en_attente',
    foreign key (creator_id) references utilisateur(id)
);
create table session_joueur(
    id int primary key auto_increment,
    pseudo varchar(255) not null,
    id_utilisateur int not null, 
    id_session_jeu int not null,
    points int default 0,
    foreign key (id_utilisateur) references utilisateur(id),
    foreign key (id_session_jeu) references session_jeu (id)
);

create table session_question(
    id int auto_increment primary key,
    id_question int not null,
    id_session_jeu int not null,
    date_ajout timestamp default current_timestamp,
    foreign key (id_question) references questions(id),
    foreign key (id_session_jeu) references session_jeu (id)
);
create table session_reponse (
    id int primary key  auto_increment,
    id_reponse_utilisateur int not null,
    id_session_jeu int not null,
    id_session_question int not null,
    reponse_date timestamp,
    foreign key(id_session_jeu) references session_jeu (id),
    foreign key(id_session_question) references session_question (id),
    foreign key(id_reponse_utilisateur) references reponse_utilisateur (id)


);
create table badges (
    id int AUTO_INCREMENT PRIMARY KEY,
    nom varchar(100), 
    description text,
    critere_points int,
    image varchar(255)
);
create table  utilisateurs_badges (
    id int AUTO_INCREMENT primary key,
    id_utilisateur int,
    id_badge int,
    date_obtention timestamp default CURRENT_TIMESTAMP,
    foreign key (id_utilisateur) references utilisateur(id),
    foreign key (id_badge) references badges(id)
);
INSERT into badges (nom, description, critere_points, image)
VALUES 
('Chef cuistot', 'Obtenu en atteignant 5000 points', 5000, '../images/jeu_quiz/chef_cuistot.png'),
("Rapide comme l'éclair", "Répondre en moins de 5 secondes", 0, "../images/jeu_quiz/eclair.png"),
("Maître des recettes", "Score parfait sur une partie", 10000, "../images/jeu_quiz/maitre.png"),
("Roi du QCM", "Répondez correctement à 10 questions d'affilée", 0, "../images/jeu_quiz/roi_qcm.png");
 
-- INSERTION --
-- Insertion des pays
INSERT INTO pays (nom, image, description) VALUES
('France', 'france.png', "La France est un pays d'Europe de l'Ouest réputé pour sa richesse culturelle et historique. Paris, sa capitale, est célèbre pour ses monuments emblématiques comme la Tour Eiffel, le Louvre et la cathédrale Notre-Dame. La France est également connue pour sa gastronomie raffinée, avec des plats comme le coq au vin, la ratatouille, et les fromages variés. Les vins français, tels que le Bordeaux et le Champagne, sont mondialement renommés. Les paysages variés, allant des plages de la Côte d'Azur aux montagnes des Alpes et des Pyrénées, complètent cette expérience culinaire unique."),
('Italie', 'italy.png', "L'Italie est un pays d''Europe du Sud célèbre pour son art, sa culture et sa cuisine. Rome, la capitale, abrite le Vatican et d''innombrables trésors historiques. Florence est le berceau de la Renaissance, tandis que Venise est connue pour ses canaux romantiques. La cuisine italienne est mondialement appréciée pour ses pizzas, pâtes, risottos et gelatos. Chaque région a ses spécialités, comme les pâtes à la carbonara à Rome, la pizza napolitaine à Naples, et les gnocchis en Toscane. Les vins italiens, tels que le Chianti et le Prosecco, accompagnent parfaitement ces délices."),
('Japon', 'japan.png', "Le Japon est un archipel d'Asie de l'Est connu pour sa fusion unique de tradition et de modernité. Tokyo, la capitale, est une métropole dynamique avec des gratte-ciels futuristes et des temples anciens. Kyoto, l'ancienne capitale, est célèbre pour ses temples bouddhistes, ses jardins zen et ses geishas. La cuisine japonaise est réputée pour ses sushis, ramen, tempuras et okonomiyaki. Le thé vert matcha et le saké sont des boissons traditionnelles appréciées. Les paysages naturels, comme le mont Fuji et les cerisiers en fleurs, ajoutent à l'expérience culinaire unique du Japon."),
('Pérou', 'peru.png', "Le Pérou est un pays d'Amérique du Sud riche en histoire et en culture. Lima, la capitale, est une ville moderne avec un centre historique classé au patrimoine mondial de l'UNESCO. Cuzco, l'ancienne capitale de l'Empire inca, est la porte d'entrée vers le Machu Picchu. La cuisine péruvienne est variée et savoureuse, avec des plats comme le ceviche, le lomo saltado, et l'aji de gallina. Les ingrédients locaux, comme le quinoa, les pommes de terre et les piments, sont largement utilisés. Les paysages diversifiés, allant des montagnes des Andes à la forêt amazonienne et aux plages du Pacifique, complètent cette riche expérience culinaire."),
('Etats-unis', 'united-states.png', "Les États-Unis sont un pays d'Amérique du Nord connu pour sa diversité culturelle et géographique. Washington D.C., la capitale, est le centre politique du pays, tandis que New York est une métropole mondiale avec des gratte-ciels emblématiques comme l'Empire State Building. Los Angeles est le berceau de l'industrie cinématographique hollywoodienne. La cuisine américaine est un melting-pot de traditions culinaires du monde entier, avec des plats comme les hamburgers, les hot-dogs, les barbecues, et les apple pies. Les paysages variés, des parcs nationaux comme Yellowstone et Yosemite aux plages de Floride et de Californie, offrent un cadre idéal pour découvrir cette diversité culinaire."),
('Inde', 'inde.png', "L'Inde est un pays d''Asie du Sud connu pour sa richesse culturelle et historique. New Delhi, la capitale, est une ville moderne avec des monuments historiques comme le Fort Rouge et le Qutub Minar. L'Inde est également célèbre pour ses sites emblématiques comme le Taj Mahal à Agra et les temples de Khajuraho. La cuisine indienne est riche en épices et en saveurs, avec des plats comme le biryani, le curry, les samosas et les naans. Chaque région a ses spécialités, comme le poulet tikka masala au Pendjab, le dosa dans le sud, et le thali au Rajasthan. Les paysages indiens sont diversifiés, allant des montagnes de l'Himalaya aux plages de Goa et aux déserts du Rajasthan."),
('Algerie', 'algerie.png', "L'Algérie est un pays d'Afrique du Nord connu pour son histoire riche et ses paysages variés. Alger, la capitale, est une ville côtière avec un centre historique classé au patrimoine mondial de l'UNESCO. L'Algérie est également célèbre pour ses sites archéologiques romains comme Timgad et Djemila. La cuisine algérienne est influencée par les traditions berbères, arabes et méditerranéennes, avec des plats comme le couscous, la tajine, et les mechoui. Les pâtisseries algériennes, comme les makrouts et les baklavas, sont également très appréciées. Les paysages algériens incluent les montagnes de l'Atlas, les oasis du Sahara et les plages de la Méditerranée."),
('Allemagne', 'allemagne.png', "L'Allemagne est un pays d'Europe centrale connu pour son économie puissante et son patrimoine culturel. Berlin, la capitale, est une ville dynamique avec des monuments historiques comme la Porte de Brandebourg et le Mur de Berlin. Munich est célèbre pour son festival de la bière, l'Oktoberfest. La cuisine allemande est riche et variée, avec des plats comme la choucroute, les saucisses, les schnitzels et les strudels. La bière allemande, avec ses nombreuses variétés comme la Weissbier et la Pilsner, est mondialement renommée. Les paysages variés, allant des montagnes des Alpes bavaroises aux forêts de la Forêt-Noire et aux plages de la mer Baltique, complètent cette expérience culinaire."),
('Togo', 'togo.png', "Le Togo est un pays d''Afrique de l''Ouest connu pour ses plages, ses marchés animés et sa culture traditionnelle. Lomé, la capitale, est une ville côtière avec un mélange de bâtiments coloniaux et modernes. Le Togo est également célèbre pour ses sites naturels comme le parc national de Fazao-Malfakassa et les cascades de Kpimé. La cuisine togolaise est riche en saveurs, avec des plats comme le fufu, le gari, et les sauces épicées à base de piments et de tomates. Les fruits tropicaux, comme les mangues et les ananas, sont également très appréciés. La culture togolaise est riche en traditions, avec des festivals et des danses colorées."),
("Côte d'ivoire", 'cote.png', "La Côte d'Ivoire est un pays d'Afrique de l'Ouest connu pour ses plages, ses parcs nationaux et sa production de cacao. Abidjan, la capitale économique, est une ville moderne avec des gratte-ciels et des quartiers animés. Yamoussoukro, la capitale politique, abrite la basilique Notre-Dame de la Paix, l'une des plus grandes églises du monde. La cuisine ivoirienne est variée et savoureuse, avec des plats comme l'attiéké, le foutou, et le garba. Les ingrédients locaux, comme le manioc, les bananes plantains et les poissons, sont largement utilisés. Les paysages diversifiés, allant des plages paradisiaques comme celles de Grand-Bassam aux réserves naturelles comme le parc national de Taï, offrent un cadre idéal pour découvrir cette riche culture culinaire.");

-- Insertion des types de recette
INSERT INTO type (nom) VALUES 
("Plats d'Entrées Équilibrées"), 
("Plats principaux Sains"),         
("Plats Végétariens"),         
("Recettes Sans Gluten"),         
("Repas Rapides"),         
("Desserts Sains"),         
("Boissons Nourrissantes"),         
("Soupes Réconfortantes");      

-- Insertion de recettes
INSERT INTO recette
    (titre, description, preparation, image, ingredients, temps_preparation, temps_cuisson, temps_total, accessoires, id_pays, id_type)
VALUES
    ("Salade de quinoa et légumes",
     "Salade colorée et nutritive avec quinoa et légumes.",
     "Préparation du Quinoa (15 minutes de cuisson + 10 minutes de repos).
      Rincez le quinoa sous l'eau froide à l'aide de la passoire fine pour enlever l'amertume. Dans une casserole moyenne, faites bouillir 400 ml d'eau ou de bouillon de légumes. Ajoutez le quinoa rincé à l'eau bouillante. Réduisez le feu à moyen et laissez mijoter pendant environ 15 minutes, jusqu'à ce que le quinoa ait absorbé tout le liquide et soit tendre. Retirez la casserole du feu et laissez reposer le quinoa couvert pendant 10 minutes. Égrenez le quinoa à l'aide d'une fourchette et laissez-le refroidir
     /Préparation des Légumes (10 minutes).
      Pendant que le quinoa cuit, lavez. Coupez les tomates cerises en deux. Coupez le concombre en dés. Coupez le poivron en fines lanières. Coupez l'avocat en cubes. Émiettez la feta ou coupez le tofu en dés
     /Préparation de la Vinaigrette (5 minutes).
      Dans un petit bol, mélangez 4 cuillères à soupe d'huile d'olive et 2 cuillères à soupe de jus de citron. Ajoutez du sel et du poivre selon votre goût. Mélangez bien à l'aide d'un fouet ou d'une fourchette
     /Assemblage de la Salade (5 minutes).
      Dans un grand bol à mélanger, combinez le quinoa refroidi, les tomates cerises, le concombre, le poivron, l'avocat et la feta ou le tofu. Versez la vinaigrette sur les ingrédients dans le bol. Mélangez bien à l'aide de cuillères en bois ou de spatules pour que tous les ingrédients soient bien enrobés de vinaigrette
     /Service.
      Servez la salade immédiatement ou réfrigérez-la jusqu'au moment de servir. Utilisez des cuillères de service pour servir la salade à table",
     "salade_de_quinoa_et_legumes.jpg",
     "200 g de quinoa, 400 ml d'eau ou de bouillon de légumes, 200 g de tomates cerises coupées en deux, 1 concombre coupé en dés, 1 poivron (rouge ou jaune ou vert) coupé en fines lanières, 1 avocat coupé en cubes, 100 g de feta ou de tofu émietté ou coupé en dés, 4 cuillères à soupe d'huile d'olive, 2 cuillères à soupe de jus de citron, Sel et poivre, au goût, Herbes fraîches (persil ou coriandre ou basilic), hachées (optionnel)",
     20,
     15,
     35,
     "Casserole moyenne : Pour cuire le quinoa, Passoire fine : Pour rincer le quinoa sous l'eau froide, Planche à découper : Pour couper les légumes, Couteau de chef : Pour couper les légumes en dés en lanières ou en cubes, Grand bol à mélanger : Pour assembler tous les ingrédients de la salade, Petit bol : Pour préparer la vinaigrette, Cuillères à soupe : Pour mesurer les ingrédients de la vinaigrette, Fouet ou fourchette : Pour mélanger la vinaigrette, Cuillères en bois ou spatules : Pour mélanger le quinoa et les légumes dans le grand bol, Saladier ou plat de service : Pour servir la salade, Cuillères de service : Pour servir la salade à table",
     4,
     1),

    ("Soupe de légumes",
     "Soupe réconfortante avec carottes, courgettes, poireaux et pommes de terre.",
     "Préparation des Légumes (10 minutes).
      Épluchez et coupez les légumes en dés ou en rondelles selon les indications
     /Préparation des Herbes et Épices (5 minutes).
      Préparez les herbes et les épices dans un petit bol. Émincez les herbes fraîches si nécessaire
     /Cuisson de la Soupe (30 minutes).
      Dans une grande casserole ou marmite, faites chauffer l'huile d'olive à feu moyen. Ajoutez l'oignon émincé et l'ail émincé, et faites-les revenir jusqu'à ce qu'ils soient translucides. Ajoutez les carottes, les courgettes, les poireaux et les pommes de terre. Faites revenir les légumes pendant quelques minutes. Ajoutez le bouillon de légumes, la feuille de laurier et les brins de thym. Portez à ébullition, puis réduisez le feu et laissez mijoter pendant environ 20 minutes, jusqu'à ce que les légumes soient tendres. Ajoutez les haricots verts et laissez mijoter encore 5 minutes. Retirez la feuille de laurier et les brins de thym avant de servir
     /Service.
      Servez la soupe chaude dans des bols à soupe. Vous pouvez ajouter du sel et du poivre selon votre goût",
     "soupe_de_legumes.jpg",
     "2 cuillères à soupe d'huile d'olive, 1 oignon émincé, 2 gousses d'ail émincées, 2 carottes coupées en rondelles, 2 courgettes coupées en dés, 2 poireaux coupés en rondelles, 2 pommes de terre moyennes coupées en cubes, 100 g de haricots verts coupés en tronçons, 1.5 litre de bouillon de légumes, 1 feuille de laurier, 2 brins de thym",
     15,
     30,
     45,
     "Grande casserole ou marmite : Pour cuire la soupe, Planche à découper : Pour couper les légumes, Couteau de chef : Pour émincer l'oignon et l'ail, et couper les légumes en dés ou en rondelles ou en cubes, Cuillère en bois ou spatule : Pour remuer les légumes pendant la cuisson, Louche : Pour servir la soupe, Bols à soupe : Pour servir la soupe individuellement, Passoire ou écumoire : Pour retirer les légumes du bouillon si nécessaire, Moulin à poivre et salière : Pour assaisonner la soupe, Petit bol : Pour préparer les herbes et les épices avant de les ajouter à la soupe",
     1,
     1),

    ("Salade de lentilles",
     "Salade savoureuse avec lentilles, épinards, radis et vinaigrette moutarde.",
     "Préparation des Lentilles (20 minutes de cuisson + 5 minutes de repos).
      Rincez les lentilles sous l'eau froide à l'aide de la passoire fine pour enlever les impuretés. Dans une casserole moyenne, faites bouillir 1 litre d'eau ou de bouillon de légumes. Ajoutez les lentilles rincées à l'eau bouillante. Réduisez le feu à moyen et laissez mijoter pendant environ 20 minutes, jusqu'à ce que les lentilles soient tendres. Retirez la casserole du feu et laissez reposer les lentilles couvertes pendant 5 minutes. Égrenez les lentilles à l'aide d'une fourchette et laissez-les refroidir
     /Préparation des Légumes (10 minutes).
      Pendant que les lentilles cuisent, lavez et coupez les légumes. Coupez les radis en rondelles. Émincez finement l'oignon rouge
     /Préparation de la Vinaigrette (5 minutes).
      Dans un petit bol, mélangez 4 cuillères à soupe d'huile d'olive, 2 cuillères à soupe de vinaigre balsamique et 1 cuillère à soupe de moutarde de Dijon. Ajoutez du sel et du poivre selon votre goût. Mélangez bien à l'aide d'un fouet ou d'une fourchette
     /Assemblage de la Salade (5 minutes).
      Dans un grand bol à mélanger, combinez les lentilles refroidies, les épinards, les radis, l'oignon rouge, les graines de tournesol et la feta ou le tofu. Versez la vinaigrette sur les ingrédients dans le bol. Mélangez bien à l'aide de cuillères en bois ou de spatules pour que tous les ingrédients soient bien enrobés de vinaigrette
     /Service.
      Servez la salade immédiatement ou réfrigérez-la jusqu'au moment de servir. Utilisez des cuillères de service pour servir la salade à table",
     "salade_de_lentilles.jpg",
     "200 g de lentilles vertes ou brunes rincées et égouttées, 1 litre d'eau ou de bouillon de légumes (pour la cuisson des lentilles), 100 g d'épinards frais, 100 g de radis coupés en rondelles, 1 oignon rouge finement émincé, 50 g de graines de tournesol (ou de graines de courge ou de sésame), 100 g de feta ou de tofu, émietté ou coupé en dés (optionnel), 4 cuillères à soupe d'huile d'olive, 2 cuillères à soupe de vinaigre balsamique, 1 cuillère à soupe de moutarde de Dijon, Sel et poivre au goût, Herbes fraîches (persil ou coriandre ou basilic), hachées (optionnel)",
     20,
     25,
     45,
     "Casserole moyenne : Pour cuire les lentilles, Passoire fine : Pour rincer et égoutter les lentilles, Planche à découper : Pour couper les légumes et les herbes, Couteau de chef : Pour émincer l'oignon rouge, couper les radis en rondelles et hacher les herbes, Grand bol à mélanger : Pour assembler tous les ingrédients de la salade, Petit bol : Pour préparer la vinaigrette, Cuillères à soupe : Pour mesurer les ingrédients de la vinaigrette, Fouet ou fourchette : Pour mélanger la vinaigrette, Cuillères en bois ou spatules : Pour mélanger les lentilles et les légumes dans le grand bol, Saladier ou plat de service : Pour servir la salade, Cuillères de service : Pour servir la salade à table, Moulin à poivre et salière : Pour assaisonner la salade",
     1,
     1),

    ("Saumon au four avec riz complet et brocoli vapeur",
     "Plat équilibré avec saumon cuit au four, riz complet et brocoli vapeur.",
     "Préparation du Riz Complet (20 minutes de cuisson + 10 minutes de repos).
      Rincez le riz complet sous l'eau froide à l'aide de la passoire fine pour enlever l'amertume. Dans une casserole moyenne, faites bouillir 4 tasses d'eau ou de bouillon de légumes. Ajoutez le riz complet rincé à l'eau bouillante. Réduisez le feu à moyen et laissez mijoter pendant environ 20 minutes, jusqu'à ce que le riz ait absorbé tout le liquide et soit tendre. Retirez la casserole du feu et laissez reposer le riz couvert pendant 10 minutes. Égrenez le riz à l'aide d'une fourchette et laissez-le refroidir
     /Préparation du Saumon (15 minutes de cuisson).
      Préchauffez le four à 200°C (400°F). Recouvrez une plaque de cuisson de papier sulfurisé. Placez les filets de saumon sur la plaque. Arrosez-les d'huile d'olive, ajoutez les rondelles de citron, l'ail émincé (optionnel), le sel, le poivre et les herbes fraîches hachées (optionnel). Pour une marinade optionnelle, mélangez la moutarde de Dijon, le miel et la sauce soja dans un bol, puis badigeonnez les filets de saumon avec ce mélange. Enfournez et faites cuire pendant environ 15 minutes, jusqu'à ce que le saumon soit cuit à cœur
     /Préparation du Brocoli Vapeur (10 minutes de cuisson).
      Pendant que le saumon cuit, préparez le brocoli. Coupez la tête de brocoli en fleurettes. Faites cuire le brocoli à la vapeur dans un cuiseur vapeur ou un panier vapeur pendant environ 10 minutes, jusqu'à ce qu'il soit tendre mais encore croquant
     /Service.
      Servez le saumon cuit avec le riz complet et le brocoli vapeur. Vous pouvez ajouter du sel et du poivre selon votre goût",
     "Saumon_au_four_avec_riz_complet_et_brocoli_vapeur.jpg",
     "4 filets de saumon (environ 600 g), 2 tasses de riz complet, 4 tasses d'eau ou de bouillon de légumes (pour la cuisson du riz), 1 tête de brocoli, coupée en fleurettes, 2 cuillères à soupe d'huile d'olive, 1 citron, coupé en rondelles, 2 gousses d'ail, émincées (optionnel), Sel et poivre, au goût, Herbes fraîches (aneth, persil, ciboulette), hachées (optionnel), 1 cuillère à soupe de moutarde de Dijon (optionnel, pour une marinade), 1 cuillère à soupe de miel (optionnel, pour une marinade), 1 cuillère à soupe de sauce soja (optionnel, pour une marinade)",
     20,
     45,
     65,
     "Plaque de cuisson : Pour cuire le saumon au four, Papier sulfurisé : Pour recouvrir la plaque de cuisson et éviter que le saumon ne colle, Casserole moyenne : Pour cuire le riz complet, Passoire fine : Pour rincer le riz complet, Cuiseur vapeur ou panier vapeur : Pour cuire le brocoli à la vapeur, Planche à découper : Pour couper le citron en rondelles et hacher les herbes, Couteau de chef : Pour couper le citron et hacher les herbes, Bol à mélanger : Pour préparer la marinade optionnelle, Cuillères à soupe : Pour mesurer les ingrédients de la marinade et l'huile d'olive, Fouet ou fourchette : Pour mélanger la marinade, Cuillères en bois ou spatules : Pour mélanger le riz complet pendant la cuisson, Saladier ou plat de service : Pour servir le saumon, le riz complet et le brocoli, Cuillères de service : Pour servir le riz complet et le brocoli, Moulin à poivre et salière : Pour assaisonner le saumon, le riz complet et le brocoli",
     5,
     2),

    ("Boulettes de dinde aux épinards et riz brun",
     "Boulettes de dinde aux épinards et riz brun, riches en protéines.",
     "Préparation du Riz Brun (20 minutes de cuisson + 10 minutes de repos).
      Rincez le riz brun sous l'eau froide à l'aide de la passoire fine pour enlever l'amertume. Dans une casserole moyenne, faites bouillir 2 tasses d'eau. Ajoutez le riz brun rincé à l'eau bouillante. Réduisez le feu à moyen et laissez mijoter pendant environ 20 minutes, jusqu'à ce que le riz ait absorbé tout le liquide et soit tendre. Retirez la casserole du feu et laissez reposer le riz couvert pendant 10 minutes. Égrenez le riz à l'aide d'une fourchette et laissez-le refroidir
     /Préparation des Boulettes (10 minutes de préparation + 25 minutes de cuisson).
      Préchauffez le four à 180°C (350°F). Dans un bol à mélanger, combinez la dinde hachée, l'oignon émincé, l'ail émincé, les épinards frais, l'œuf, la chapelure, le sel, le poivre et le paprika. Mélangez bien tous les ingrédients. Formez des boulettes de taille égale avec le mélange. Placez les boulettes sur une plaque de cuisson recouverte de papier sulfurisé. Arrosez-les d'huile d'olive. Enfournez et faites cuire pendant environ 25 minutes, jusqu'à ce que les boulettes soient dorées et cuites à cœur
     /Service.
      Servez les boulettes de dinde avec le riz brun et les épinards. Vous pouvez ajouter du sel et du poivre selon votre goût",
     "Boulettes_de_dinde_aux_epinards_et_riz_brun.jpg",
     "500 g de dinde hachée, 1 tasse de riz brun, 2 tasses d'eau, 200 g d'épinards frais, 1 oignon, émincé, 2 gousses d'ail, émincées, 1 œuf, 2 cuillères à soupe de chapelure, 2 cuillères à soupe d'huile d'olive, Sel, poivre, paprika",
     20,
     25,
     45,
     "Bol à mélanger : Pour préparer les boulettes, Casserole moyenne : Pour cuire le riz brun, Plaque de cuisson : Pour cuire les boulettes au four, Planche à découper : Pour couper les légumes, Couteau de chef : Pour émincer l'oignon et l'ail, Cuillères à soupe : Pour mesurer les ingrédients, Cuillères en bois ou spatules : Pour mélanger le riz brun pendant la cuisson, Saladier ou plat de service : Pour servir les boulettes, Cuillères de service : Pour servir le riz brun et les épinards, Minuteur de cuisine (optionnel) : Pour surveiller le temps de cuisson des boulettes, Tablier de cuisine (optionnel) : Pour protéger vos vêtements pendant la préparation, Gants de cuisine (optionnel) : Pour manipuler la plaque de cuisson chaude",
     5,
     2),

    ("Wraps de laitue au poulet et avocat",
     "Wraps légers avec laitue, poulet grillé, avocat et légumes.",
     "Préparation du Poulet (10 minutes de cuisson).
      Dans une poêle, faites griller les dés de poulet à feu moyen jusqu'à ce qu'ils soient bien cuits. Ajoutez la sauce soja, le jus de citron et l'huile de sésame. Mélangez bien pour enrober les dés de poulet de sauce
     /Préparation des Légumes (10 minutes).
      Pendant que le poulet cuit, lavez et coupez les légumes en julienne. Coupez l'avocat en tranches
     /Assemblage des Wraps (5 minutes).
      Disposez les feuilles de laitue romaine sur une assiette. Remplissez chaque feuille avec des dés de poulet, des tranches d'avocat, du concombre, de la carotte et du poivron rouge en julienne
     /Service.
      Servez les wraps immédiatement ou réfrigérez-les jusqu'au moment de servir. Utilisez des cuillères de service pour servir les wraps à table",
     "Wraps_de_laitue_au_poulet_et_avocat.jpg",
     "2 poitrines de poulet, coupées en dés, 1 avocat, coupé en tranches, 1 concombre, coupé en julienne, 1 carotte, coupée en julienne, 1 poivron rouge, coupé en julienne, 1 tête de laitue romaine, feuilles séparées, 2 cuillères à soupe de sauce soja, 1 cuillère à soupe de jus de citron, 1 cuillère à soupe d'huile de sésame, Sel, poivre",
     20,
     10,
     30,
     "Poêle : Pour faire griller le poulet, Planche à découper : Pour couper les légumes et l'avocat, Couteau de chef : Pour couper les légumes en julienne, Bol à mélanger : Pour préparer la sauce, Cuillères à soupe : Pour mesurer les ingrédients de la sauce, Fouet ou fourchette : Pour mélanger la sauce, Saladier ou plat de service : Pour servir les wraps, Cuillères de service : Pour servir les wraps à table, Minuteur de cuisine (optionnel) : Pour surveiller le temps de cuisson du poulet, Tablier de cuisine (optionnel) : Pour protéger vos vêtements pendant la préparation, Gants de cuisine (optionnel) : Pour manipuler la poêle chaude",
     5,
     2),

    ("Lait d'or",
     "Boisson réconfortante et anti-inflammatoire au curcuma.",
     "Préparation du Lait d'Or (5 minutes de préparation + 5 minutes de cuisson).
      Dans une casserole moyenne, chauffez le lait d'amande ou de coco à feu moyen. Ajoutez la curcuma en poudre, la cannelle en poudre, le gingembre en poudre, le miel ou le sirop d'érable et une pincée de poivre noir. Mélangez bien à l'aide d'une cuillère en bois ou d'une spatule jusqu'à ce que le mélange soit homogène et chaud
     /Service.
      Versez le lait d'or dans une tasse ou un mug et dégustez immédiatement",
     "Lait_d_or.jpg",
     "1 tasse de lait d'amande ou de lait de coco, 1 cuillère à café de curcuma en poudre, 1/2 cuillère à café de cannelle en poudre, 1/2 cuillère à café de gingembre en poudre, 1 cuillère à café de miel ou de sirop d'érable, 1 pincée de poivre noir",
     5,
     5,
     10,
     "Casserole moyenne : Pour chauffer le lait, Cuillère en bois ou spatule : Pour mélanger les ingrédients, Tasse ou mug : Pour servir le lait d'or",
     5,
     7),

    ("Thé vert matcha",
     "Thé riche en antioxydants, préparé avec de la poudre de matcha.",
     "Préparation du Thé Vert Matcha (5 minutes).
      Dans un bol à thé, mélangez la poudre de matcha avec un peu d'eau chaude (mais pas bouillante) pour former une pâte. Ajoutez le reste de l'eau chaude et fouettez vigoureusement avec un fouet à thé (chasen) jusqu'à ce que le mélange soit mousseux. Ajoutez le miel ou le sirop d'érable (optionnel) et mélangez bien
     /Service.
      Versez le thé vert matcha dans une tasse ou un mug et dégustez immédiatement",
     "the_vert_matcha.jpg",
     "1 cuillère à café de poudre de matcha, 1 tasse d'eau chaude (mais pas bouillante), 1 cuillère à café de miel ou de sirop d'érable (optionnel)",
     5,
     0,
     5,
     "Bol à thé : Pour mélanger la poudre de matcha, Fouet à thé (chasen) : Pour fouetter le matcha, Tasse ou mug : Pour servir le thé vert matcha",
     2,
     7),

    ("Smoothie aux baies",
     "Smoothie riche en antioxydants et en vitamines, parfait pour le petit-déjeuner.",
     "Préparation du Smoothie aux Baies (5 minutes).
      Dans un blender, mixez les baies mélangées, la banane, le lait d'amande ou le yaourt nature, les graines de chia et le miel (optionnel) jusqu'à obtenir une consistance lisse. Ajoutez quelques glaçons et mixez à nouveau jusqu'à ce que le smoothie soit bien froid
     /Service.
      Versez le smoothie dans une tasse ou un verre et dégustez immédiatement",
     "smoothie_aux_baies.jpg",
     "1 tasse de baies mélangées (fraises, myrtilles, framboises), 1 banane, 1 tasse de lait d'amande ou de yaourt nature, 1 cuillère à soupe de graines de chia, 1 cuillère à soupe de miel (optionnel), Quelques glaçons",
     5,
     0,
     5,
     "Blender : Pour mixer les ingrédients, Tasse ou verre : Pour servir le smoothie",
     5,
     7),

    ("Mousse au chocolat avocat",
     "Mousse au chocolat crémeuse et riche en nutriments, préparée avec des avocats.",
     "Préparation de la Mousse au Chocolat Avocat (10 minutes de préparation + 60 minutes de réfrigération).
      Dans un blender, mixez les avocats mûrs, le cacao en poudre non sucré, le sirop d'érable, l'extrait de vanille et une pincée de sel jusqu'à obtenir une consistance lisse et crémeuse. Versez la mousse dans des ramequins et réfrigérez pendant au moins 60 minutes avant de servir
     /Service.
      Servez la mousse au chocolat avocat bien fraîche dans des ramequins",
     "mousse_au_chocolat_avocat.jpg",
     "2 avocats mûrs, 1/4 tasse de cacao en poudre non sucré, 1/4 tasse de sirop d'érable, 1 cuillère à café d'extrait de vanille, 1 pincée de sel",
     10,
     0,
     70,
     "Blender : Pour mixer les ingrédients, Ramequins : Pour servir la mousse, Cuillère : Pour mélanger les ingrédients",
     5,
     6),

    ("Pudding au chia",
     "Pudding crémeux et riche en fibres, préparé avec des graines de chia.",
     "Préparation du Pudding au Chia (5 minutes de préparation + 120 minutes de réfrigération).
      Dans un bol à mélanger, combinez les graines de chia, le lait d'amande, le sirop d'érable et l'extrait de vanille. Mélangez bien à l'aide d'une cuillère. Versez le mélange dans des ramequins et réfrigérez pendant au moins 120 minutes, jusqu'à ce que le pudding soit bien pris
     /Service.
      Servez le pudding au chia bien frais dans des ramequins. Vous pouvez garnir avec des fruits frais (optionnel)",
     "pudding_au_chia.jpg",
     "1/4 tasse de graines de chia, 1 tasse de lait d'amande, 1 cuillère à soupe de sirop d'érable, 1/2 cuillère à café d'extrait de vanille, Fruits frais pour garnir (optionnel)",
     5,
     0,
     125,
     "Bol à mélanger : Pour mélanger les ingrédients, Ramequins : Pour servir le pudding, Cuillère : Pour mélanger les ingrédients",
     5,
     6),

    ("Sorbet à la banane",
     "Sorbet crémeux et naturellement sucré, préparé uniquement avec des bananes congelées.",
     "Préparation du Sorbet à la Banane (5 minutes).
      Dans un blender, mixez les bananes mûres congelées et coupées en morceaux jusqu'à obtenir une consistance lisse et crémeuse
     /Service.
      Servez le sorbet à la banane immédiatement dans des bols ou des verres",
     "sorbet_a_la_banane.jpg",
     "4 bananes mûres, congelées et coupées en morceaux",
     5,
     0,
     5,
     "Blender : Pour mixer les ingrédients, Bols ou verres : Pour servir le sorbet, Cuillère : Pour mélanger les ingrédients",
     5,
     6),

    ("Brochettes de crevettes et légumes grillés",
     "Brochettes savoureuses et colorées, parfaites pour un barbecue ou un dîner estival.",
     "Préparation de la Marinade (10 minutes).
      Dans un bol, mélangez l'huile d'olive, le jus de citron, l'ail émincé, le paprika, le sel et le poivre. Ajoutez les crevettes et mélangez bien pour les enrober de marinade. Laissez mariner pendant 10 minutes
     /Préparation des Légumes (10 minutes).
      Pendant que les crevettes marinent, lavez et coupez les légumes en morceaux de taille égale. Coupez les poivrons en morceaux, les courgettes en rondelles et les oignons en quartiers
     /Assemblage des Brochettes (10 minutes).
      Préchauffez le gril ou le barbecue à feu moyen-élevé. Enfilez les crevettes marinées et les morceaux de légumes sur des brochettes en alternant les ingrédients
     /Cuisson des Brochettes (10 minutes).
      Placez les brochettes sur le gril ou le barbecue préchauffé. Faites cuire pendant environ 10 minutes, en retournant les brochettes à mi-cuisson, jusqu'à ce que les crevettes soient roses et bien cuites et que les légumes soient tendres et légèrement grillés
     /Service.
      Servez les brochettes chaudes, accompagnées de riz, de quinoa ou d'une salade verte. Vous pouvez également les arroser d'un filet de jus de citron frais avant de servir",
     "brochettes_de_crevettes_et_legumes_grilles.jpg",
     "500 g de crevettes décortiquées, 2 poivrons (rouge et jaune), coupés en morceaux, 2 courgettes, coupées en rondelles, 2 oignons, coupés en quartiers, 4 cuillères à soupe d'huile d'olive, 2 cuillères à soupe de jus de citron, 2 gousses d'ail, émincées, 1 cuillère à café de paprika, Sel et poivre, au goût",
     30,
     10,
     40,
     "Bol : Pour préparer la marinade, Planche à découper : Pour couper les légumes, Couteau de chef : Pour émincer l'ail et couper les légumes en morceaux, Brochettes en bois ou en métal : Pour enfiler les crevettes et les légumes, Gril ou barbecue : Pour cuire les brochettes, Pince de cuisine : Pour retourner les brochettes pendant la cuisson, Plat de service : Pour servir les brochettes, Minuteur de cuisine : Pour surveiller le temps de cuisson",
     5,
     4),

    ("Filet mignon de porc à la moutarde",
     "Filet mignon de porc savoureux et tendre, parfait pour un dîner élégant.",
     "Préparation de la Marinade (10 minutes).
      Dans un bol, mélangez la moutarde de Dijon, le miel, l'ail émincé, le thym, le sel et le poivre. Ajoutez l'huile d'olive et mélangez bien jusqu'à obtenir une consistance homogène
     /Préparation du Filet Mignon (5 minutes).
      Préchauffez le four à 200°C (400°F). Placez le filet mignon dans un plat allant au four. Badigeonnez généreusement le filet mignon avec la marinade de moutarde sur tous les côtés
     /Cuisson du Filet Mignon (30 minutes).
      Enfournez le filet mignon et faites-le cuire pendant environ 30 minutes, ou jusqu'à ce qu'il atteigne la température interne désirée (63°C pour une cuisson rosée). Retirez le filet mignon du four et laissez-le reposer pendant 10 minutes avant de le trancher
     /Service.
      Tranchez le filet mignon en médaillons et servez-le chaud. Vous pouvez l'accompagner de légumes rôtis ou d'une salade verte",
     "filet_mignon_de_porc_a_la_moutarde.jpg",
     "1 filet mignon de porc (environ 600 g), 3 cuillères à soupe de moutarde de Dijon, 2 cuillères à soupe de miel, 2 gousses d'ail, émincées, 1 cuillère à soupe de thym frais, haché, Sel et poivre, au goût, 2 cuillères à soupe d'huile d'olive",
     15,
     30,
     45,
     "Bol : Pour préparer la marinade, Plat allant au four : Pour cuire le filet mignon, Couteau de chef : Pour émincer l'ail, Cuillères à soupe : Pour mesurer les ingrédients de la marinade, Fourchette : Pour badigeonner le filet mignon avec la marinade, Thermomètre de cuisson : Pour vérifier la température interne du filet mignon, Plat de service : Pour servir le filet mignon tranché, Couteau à viande : Pour trancher le filet mignon, Minuteur de cuisine : Pour surveiller le temps de cuisson",
     5,
     4),

    ('Salade de Poulet Rapide',
     'Une salade de poulet rapide et facile à préparer.',
     'Mélanger tous les ingrédients.',
     'salade_poulet.jpg',
     'Poulet, laitue, tomates, vinaigrette',
     10,
     0,
     10,
     'Saladier',
     1,
     5),

    ('Wraps de Dinde',
     'Wraps de dinde sains et rapides.',
     'Enrouler les ingrédients dans une tortilla.',
     'wraps_dinde.jpg',
     'Tortilla, dinde, légumes, sauce',
     5,
     0,
     5,
     'Aucun',
     1,
     5),

    ('Pâtes à l\'Ail et à l\'Huile',
     'Des pâtes rapides avec de l\'ail et de l\'huile d\'olive.',
     'Cuire les pâtes et mélanger avec l\'ail et l\'huile.',
     'pates_ail_huile.jpg',
     'Pâtes, ail, huile d\'olive, persil',
     10,
     10,
     20,
     'Casserole',
     1,
     5),

    ('Omelette aux Légumes',
     'Une omelette rapide avec des légumes frais.',
     'Battre les œufs et cuire avec les légumes.',
     'omelette_legumes.jpg',
     'Œufs, légumes, sel, poivre',
     5,
     5,
     10,
     'Poêle',
     1,
     5),

    ('Tacos de Poulet',
     'Tacos de poulet rapides et savoureux.',
     'Cuire le poulet et assembler les tacos.',
     'tacos_poulet.jpg',
     'Tortillas, poulet, légumes, sauce',
     10,
     10,
     20,
     'Poêle',
     1,
     5),

    ("Akume avec poisson fumé",
     "Akume accompagné de poisson fumé et de légumes.",
     "Préparation de l'akume (20 minutes de cuisson). Faites cuire le maïs dans de l'eau salée jusqu'à ce qu'il soit tendre. Égouttez et pilonnez jusqu'à obtenir une pâte lisse. / Préparation du poisson fumé (10 minutes). Faites griller le poisson fumé jusqu'à ce qu'il soit bien doré. / Préparation des légumes (10 minutes). Lavez et coupez les légumes en morceaux. / Service. Servez l'akume avec le poisson fumé et les légumes.",
     "akume_poisson_fume.webp",
     "200 g de maïs, 200 g de poisson fumé, 1 tomate, 1 oignon, 1 piment, Épices (sel, poivre)",
     20,
     20,
     40,
     "Casserole : Pour cuire le maïs, Pilon et mortier : Pour pilonner l'akume, Gril : Pour griller le poisson, Couteau : Pour couper les légumes",
     9,
     4),

    ("Salade d'avocat et de crevettes",
     "Salade légère et équilibrée, parfaite pour débuter un repas.",
     "Épluchez l'avocat et coupez-le en dés. Faites cuire les crevettes à la vapeur. Mélangez avec des tomates cerises coupées, de la laitue, et une vinaigrette maison.",
     "salade_avocat_crevettes.png",
     "1 avocat, 150 g de crevettes, 1 laitue, 100 g de tomates cerises, vinaigrette (huile d'olive, citron, sel, poivre)",
     10,
     5,
     15,
     "Bol : Pour mélanger les ingrédients, Couteau : Pour couper les légumes, Vapeur : Pour cuire les crevettes",
     9,
     1),

     ("Beignets de maïs",
      "Petits beignets croquants et dorés à base de maïs.",
      "Mélangez la farine de maïs avec du lait, des œufs et du sel. Faites frire la pâte en petites portions dans de l'huile chaude.",
      "beignets_mais.png",
      "200 g de farine de maïs, 2 œufs, 100 ml de lait, huile, sel",
      10,
      10, 
      20,
      "Bol : Pour mélanger, Poêle : Pour frire, Spatule : Pour retourner les beignets", 
      9, 
      1),

      ("Sauce gombo et poisson",
       "Un plat nutritif avec du gombo frais et du poisson mijoté.",
       "Coupez les gombos et faites-les mijoter avec des tomates, oignons, et poisson dans une sauce épicée.",
       "sauce_gombo_poisson.png",
       "300 g de gombo, 200 g de poisson, 2 tomates, 1 oignon, épices (sel, poivre, piment)",
       15,
       25, 
       40,
       "Casserole : Pour mijoter la sauce, Couteau : Pour couper les légumes", 
       9, 
       2),

    ("Œufs brouillés aux tomates",
    "Un plat simple et rapide, parfait pour un repas improvisé.",
    "Battez les œufs, faites-les cuire avec des tomates et oignons sautés.",
    "oeufs_brouilles_tomates.webp",
    "4 œufs, 2 tomates, 1 oignon, sel, huile",
    5, 5, 10,
    "Bol : Pour battre les œufs, Poêle : Pour cuire les œufs", 9, 5),
    
    ("Spaghetti à la togolaise",
    "Un plat rapide et savoureux, des spaghetti sautés avec des légumes et des épices.",
    "Faites cuire les spaghetti, sautez-les avec des légumes coupés et ajoutez les épices.",
    "spaghetti_togolais.webp",
    "200 g de spaghetti, 100 g de carottes, 1 oignon, 1 tomate, épices",
    10, 10, 20,
    "Casserole : Pour cuire les spaghetti, Poêle : Pour sauter les légumes", 9, 5),

    ("Soupe de patate douce",
    "Une soupe veloutée et nourrissante à base de patate douce et de lait de coco.",
    "Faites mijoter les patates douces dans de l’eau, ajoutez le lait de coco et mixez pour obtenir une texture lisse.",
    "soupe_patate_douce.png",
    "400 g de patates douces, 200 ml de lait de coco, épices (sel, poivre)",
    15, 15, 30,
    "Casserole : Pour cuire les patates douces, Mixeur : Pour mixer la soupe", 9, 8),

    ("Pâte de mil avec sauce légumes",
    "Un plat sans gluten à base de pâte de mil accompagnée de légumes.",
    "Préparez une pâte avec la farine de mil et de l'eau chaude. Servez avec une sauce aux légumes variés.",
    "pate_mil_legumes.jpg",
    "200 g de farine de mil, 300 g de légumes (carottes, courgettes, poivrons), épices",
    15, 25, 40,
    "Casserole : Pour préparer la pâte, Poêle : Pour cuire les légumes", 9, 4),

    ("Fufu d'igname",
    "Un plat traditionnel à base d'igname pilée, servi avec des sauces végétariennes.",
    "Faites bouillir les ignames. Écrasez-les avec un pilon jusqu'à obtenir une pâte lisse.",
    "fufu_igname.webp",
    "400 g d'ignames, sel",
    20, 20, 40,
    "Casserole : Pour cuire les ignames, Pilon et mortier : Pour écraser les ignames", 9, 3),

    ("Riz sauté aux légumes",
    "Un riz coloré et nourrissant avec des légumes frais.",
    "Faites cuire le riz. Sauter les légumes dans une poêle avec de l'huile d'olive, mélangez-les avec le riz et assaisonnez.",
    "riz_sauté_légumes.jpg",
    "200 g de riz, 100 g de carottes, 50 g de poivrons, 1 oignon, épices (sel, poivre)",
    15, 20, 35,
    "Casserole : Pour cuire le riz, Poêle : Pour sauter les légumes", 9, 3),

    ("Kom",
    "Un plat à base de maïs fermenté accompagné de sauce épicée.",
    "Faites cuire le maïs fermenté jusqu'à obtenir une consistance ferme. Préparez une sauce tomate épicée en parallèle.",
    "kom.webp",
    "200 g de farine de maïs fermentée, 2 tomates, 1 oignon, piment, sel",
    15, 20, 35,
    "Casserole : Pour cuire le kom, Poêle : Pour préparer la sauce", 9, 2),

    ("Pâte noire et sauce arachide",
    "Un plat traditionnel et équilibré à base de pâte de manioc et de sauce arachide.",
    "Préparez la pâte noire en mélangeant la farine de manioc avec de l'eau chaude. Faites mijoter la pâte d'arachide avec des tomates, des oignons et des épices.",
    "pate_noire.webp",
    "300 g de farine de manioc, 200 g de pâte d'arachide, 2 tomates, 1 oignon, épices",
    20, 30, 50,
    "Casserole : Pour préparer la sauce, Spatule : Pour remuer la pâte noire", 9, 2),

    ("Tapioca à la sauce tomate",
    "Un plat léger et savoureux à base de tapioca accompagné de sauce tomate parfumée.",
    "Préparation du Tapioca (10 minutes). Faites chauffer de l'eau dans une casserole et ajoutez le tapioca. Laissez cuire à feu doux tout en remuant jusqu'à ce qu'il devienne translucide. Égouttez si nécessaire. /Préparation de la Sauce Tomate (10 minutes). Dans une poêle, faites chauffer l'huile d'olive. Ajoutez l'oignon finement haché et faites revenir jusqu'à ce qu'il soit doré. Ajoutez les tomates coupées en dés et laissez mijoter pendant 10 minutes. Assaisonnez avec du sel et du poivre. /Service. Servez le tapioca chaud, accompagné de la sauce tomate.",
    "tapioca_sauce_tomate.webp",
    "150 g de tapioca, 2 tomates, 1 oignon, 1 cuillère d'huile d'olive, sel, poivre",
    10, 20, 30,
    "Casserole : Pour cuire le tapioca, Poêle : Pour préparer la sauce tomate", 9, 1),

    ("Croquettes de manioc",
    "Petites croquettes croustillantes à base de manioc râpé, parfaites pour une entrée légère.",
    "Préparation des Ingrédients (10 minutes). Râpez le manioc épluché dans un bol. Ajoutez les œufs battus, la farine et une pincée de sel. Mélangez jusqu'à obtenir une pâte homogène. /Préparation des Croquettes (10 minutes). Faites chauffer l'huile dans une poêle à feu moyen. Formez des petites boules avec la pâte et déposez-les délicatement dans l'huile chaude. Faites frire jusqu'à ce que les croquettes soient dorées et croustillantes. Égouttez sur du papier absorbant avant de servir.",
    "croquettes_manioc.webp",
    "200 g de manioc, 2 œufs, 50 g de farine, sel, huile pour friture",
    15, 10, 25,
    "Bol : Pour mélanger les ingrédients, Poêle : Pour frire les croquettes", 9, 1),

    ("Djenkoumé au poulet",
    "Un plat traditionnel à base de farine de maïs épicée et de poulet mijoté dans une sauce tomate.",
    "Préparation du Djenkoumé (20 minutes). Dans une casserole, mélangez la farine de maïs avec de l'eau chaude en remuant constamment jusqu'à obtenir une pâte épaisse. Réservez au chaud. /Préparation du Poulet (30 minutes). Faites revenir l'oignon haché dans une poêle avec un peu d'huile jusqu'à ce qu'il soit translucide. Ajoutez les tomates coupées en dés et laissez mijoter pendant 5 minutes. Ajoutez les morceaux de poulet, les épices (gingembre, ail) et un peu d'eau. Couvrez et laissez mijoter pendant 30 minutes jusqu'à ce que le poulet soit tendre. /Service. Servez le poulet avec sa sauce sur le Djenkoumé chaud.",
    "djenkoume_poulet.webp",
    "300 g de farine de maïs, 500 g de poulet, 3 tomates, 2 oignons, épices (gingembre, ail)",
    20, 40, 60,
    "Casserole : Pour préparer le djenkoumé, Poêle : Pour cuire le poulet", 9, 2),
   
    ("Ablo avec poisson grillé",
    "Des petites galettes moelleuses de maïs servies avec du poisson grillé et une sauce tomate pimentée.",
    "Préparation de l'Ablo (30 minutes). Dans un grand bol, mélangez la farine de maïs, la farine de riz et un peu d'eau tiède pour obtenir une pâte lisse. Laissez la pâte reposer pendant 1 heure pour permettre à la levure de gonfler. /Cuisson de l'Ablo (20 minutes). Faites cuire la pâte à la vapeur en formant de petites galettes dans des ramequins ou des feuilles de bananier. Cuisez pendant 20 minutes. /Préparation du Poisson (10 minutes). Assaisonnez le poisson avec du sel et du poivre, puis grillez-le sur un gril ou au four jusqu'à ce qu'il soit doré. /Préparation de la Sauce Tomate Pimentée (10 minutes). Préparez une sauce tomate pimentée en faisant mijoter les tomates hachées avec de l'oignon, du piment et des épices. /Service. Servez l'ablo avec le poisson grillé et la sauce.",
    "ablo_poisson_grille.webp",
    "300 g de farine de maïs, 200 g de farine de riz, 1 poisson (tilapia), 2 tomates",
    30, 30, 60,
    "Cocotte : Pour cuire à la vapeur l'ablo, Gril : Pour griller le poisson", 9, 2),
   
    ("Fried Yam (Igname frit)",
    "Des tranches d'igname frites, croustillantes à l'extérieur et moelleuses à l'intérieur, servies avec une sauce pimentée.",
    "Préparation des Ingrédients (10 minutes). Épluchez l'igname et coupez-la en tranches régulières. Rincez les tranches à l'eau froide et égouttez-les. /Cuisson des Igname (10 minutes). Chauffez l'huile dans une poêle profonde à feu moyen. Plongez les tranches d'igname dans l'huile chaude et faites frire jusqu'à ce qu'elles soient dorées et croustillantes. Retournez-les régulièrement pour une cuisson uniforme. /Service. Égouttez sur du papier absorbant. Servez chaud avec une sauce pimentée ou une sauce tomate.",
    "fried_yam.webp",
    "500 g d'igname, huile pour friture, sel",
    10, 10, 20,
    "Couteau : Pour couper l'igname, Poêle : Pour frire", 9, 3),

    ("Koklo Meme (Poulet braisé)",
    "Un poulet mariné et cuit à la braise, servi avec une sauce épicée.",
    "Préparation de la Marinade (10 minutes). Mélangez l'ail, l'oignon, les épices, l'huile d'olive et le sel. Enduisez le poulet de marinade et laissez mariner. /Cuisson du Poulet (30 minutes). Faites cuire le poulet sur un gril ou au barbecue pendant 30 minutes, en le retournant à mi-cuisson. /Service. Servez chaud, accompagné de la sauce tomate épicée.",
    "koklo_meme.webp",
    "1 poulet, 1 oignon, 2 gousses d'ail, épices (paprika, curry), huile d'olive, sel, tomates",
    10, 30, 40,
    "Gril : Pour cuire le poulet", 9, 2),

    ("Kpalimé (Soupe de légumes et viande)",
    "Une soupe épaisse avec des légumes et de la viande, typique du Togo.",
    "Préparation des Ingrédients (10 minutes). Faites bouillir la viande dans de l'eau avec des épices. /Préparation des Légumes (10 minutes). Coupez les légumes (feuilles de manioc, tomates) et ajoutez-les à la soupe. /Cuisson (40 minutes). Laissez mijoter jusqu'à ce que la viande soit tendre et que les légumes soient cuits. /Service. Servez chaud.",
    "kpalime_soupe.webp",
    "500 g de viande (bœuf ou mouton), 3 tomates, 2 oignons, 200 g de feuilles de manioc, épices",
    10, 40, 50,
    "Casserole : Pour cuire la soupe", 9, 8),

    ("Zomé (Sauce épicée avec légumes)",
    "Une sauce épicée à base de légumes et de tomates.",
    "Préparation des Ingrédients (10 minutes). Hachez les oignons, les tomates et le piment. /Cuisson de la Sauce (15 minutes). Faites revenir les légumes dans de l'huile de palme. Ajoutez les épices et laissez mijoter. /Service. Servez avec du riz ou du fufu.",
    "zome_sauce.webp",
    "3 tomates, 2 oignons, 1 piment, huile de palme, épices, sel, poivre",
    10, 15, 25,
    "Poêle : Pour préparer la sauce", 9, 3),

    ("Sambou (Bouillie de maïs)",
    "Une bouillie sucrée de maïs, idéale pour le petit déjeuner.",
    "Préparation de la Bouillie (5 minutes). Faites bouillir de l'eau, puis ajoutez la farine de maïs en remuant. /Cuisson de la Bouillie (10 minutes). Continuez à remuer jusqu'à ce que la bouillie devienne épaisse. /Service. Servez chaud avec du sucre ou du lait.",
    "sambou_bouillie.webp",
    "150 g de farine de maïs, eau, sucre, lait (facultatif)",
    5, 10, 15,
    "Casserole : Pour préparer la bouillie", 9, 1),

    ("Fried Plantain (Plaine Frite)",
    "Des bananes plantains frites, délicieuses et dorées, souvent servies comme accompagnement.",
    "Préparation des Plantains (5 minutes). Épluchez les bananes plantains et coupez-les en tranches. /Cuisson des Plantains (10 minutes). Faites chauffer de l'huile dans une poêle et faites frire les tranches de plantain jusqu'à ce qu'elles soient dorées et croustillantes. /Service. Égouttez sur du papier absorbant et servez chaud.",
    "fried_plantain.webp",
    "4 bananes plantains, huile pour friture, sel",
    5, 10, 15,
    "Poêle : Pour frire les plantains", 9, 3),

    ("Boeuf à la Sauce d’Arachide",
    "Un plat savoureux à base de viande de bœuf cuite dans une sauce épaisse à base d’arachides.",
    "Préparation de la Viande (10 minutes). Coupez le bœuf en morceaux et faites-le cuire dans de l'eau avec des épices. /Préparation de la Sauce (15 minutes). Faites revenir l'oignon, l'ail et les tomates dans de l'huile d'olive. Ajoutez le beurre d'arachide et de l'eau pour obtenir une sauce épaisse. /Cuisson (30 minutes). Laissez mijoter le tout jusqu'à ce que la viande soit tendre et que la sauce soit bien réduite. /Service. Servez chaud avec du riz ou du fufu.",
    "boeuf_sauce_arachide.webp",
    "500 g de viande de bœuf, 3 tomates, 1 oignon, 2 cuillères à soupe de beurre d'arachide, épices, sel, poivre",
    10, 45, 55,
    "Casserole : Pour cuire la viande et la sauce", 9, 2),

    ("Koko (Bouillie de Maïs)",
    "Une bouillie douce et crémeuse à base de maïs, souvent consommée au petit-déjeuner.",
    "Préparation de la Pâte (5 minutes). Mélangez la farine de maïs avec un peu d'eau pour obtenir une pâte lisse. /Cuisson de la Bouillie (15 minutes). Faites chauffer de l'eau dans une casserole, ajoutez la pâte de maïs et faites cuire à feu doux en remuant constamment jusqu'à ce que la bouillie épaississe. /Service. Servez chaud, sucré avec du lait condensé ou accompagné de pain.",
    "koko_bouillie_mais.webp",
    "200 g de farine de maïs, 500 ml d'eau, sucre (facultatif), lait condensé (facultatif)",
    5, 15, 20,
    "Casserole : Pour cuire la bouillie", 9, 1),

    ("Attiéké Poisson Braisé",
 "Plat emblématique ivoirien à base de semoule de manioc accompagnée de poisson braisé et de légumes.",
 "Préparation de l'Attiéké (10 minutes) :
  Chauffez l’attiéké à la vapeur ou au micro-ondes pendant environ 5 minutes. Mélangez avec un peu d'huile végétale pour qu’il reste bien moelleux.
 / Préparation du Poisson (15 minutes de marinade + 20 minutes de cuisson) :
  Lavez et videz le poisson (tilapia ou capitaine). Dans un bol, préparez une marinade avec 3 gousses d'ail écrasées, du gingembre râpé, du jus de citron, du piment, et du sel. Enduisez le poisson de cette marinade et laissez reposer 15 minutes. Faites griller ou braiser le poisson au barbecue ou au four.
 / Préparation des Légumes (10 minutes) :
  Coupez les tomates, oignons et piments en rondelles pour accompagner l’attiéké et le poisson.
 / Service :
  Servez l'attiéké chaud avec le poisson braisé, accompagné de légumes frais.",
 "attieke_poisson_braise.webp",
 "500 g d’attiéké, 2 poissons (tilapia ou capitaine), 3 gousses d’ail, 1 morceau de gingembre frais râpé, Jus d’un citron, 2 cuillères à soupe d’huile végétale, Sel, Piment (selon le goût), 2 tomates, 1 oignon, Piments pour l'accompagnement",
 15,
 20,
 35,
 "Cuit-vapeur ou micro-ondes : Pour chauffer l’attiéké, Bol : Pour préparer la marinade, Barbecue ou four : Pour griller ou braiser le poisson, Planche à découper : Pour couper les légumes, Couteau : Pour préparer les légumes",
 10,
 2),

 ("Foutou Banane et Sauce Graine",
 "Une combinaison ivoirienne traditionnelle à base de pâte de banane plantain et sauce aux graines de palme.",
 "Préparation du Foutou Banane (30 minutes) :
  Épluchez 3 bananes plantains mûres et 2 tubercules d’igname. Faites-les cuire dans de l’eau bouillante jusqu’à ce qu’ils soient tendres. Égouttez et pilez-les ensemble pour obtenir une pâte homogène.
 / Préparation de la Sauce Graine (20 minutes) :
  Faites chauffer la pâte de graines de palme avec de l’eau dans une casserole. Ajoutez des morceaux de viande (bœuf ou poisson fumé), des crevettes séchées, et assaisonnez avec du sel, de l’ail et du piment. Laissez mijoter jusqu’à épaississement.
 / Service :
  Servez le foutou accompagné de la sauce chaude.",
 "foutou_banane_sauce_graine.webp",
 "3 bananes plantains mûres, 2 tubercules d’igname, 200 g de pâte de graines de palme, 200 g de viande ou poisson fumé, 50 g de crevettes séchées, Sel, Piment, 2 gousses d’ail",
 20,
 30,
 50,
 "Casserole : Pour cuire les bananes et ignames, Mortier et pilon : Pour piler le foutou, Marmite : Pour mijoter la sauce, Louche : Pour servir la sauce, Plat de service : Pour présenter le foutou et la sauce",
 10,
 3),

 ("Alloco (Banane Plantain Frite)",
 "Entrée ivoirienne populaire à base de bananes plantains mûres frites, servies avec une sauce tomate épicée.",
 "Préparation des Bananes (10 minutes) :
  Épluchez les bananes plantains mûres et coupez-les en rondelles. Chauffez de l’huile végétale dans une poêle ou une friteuse.
 / Cuisson des Bananes (10 minutes) :
  Faites frire les rondelles de bananes dans l’huile chaude jusqu’à ce qu’elles soient dorées. Égouttez sur du papier absorbant.
 / Préparation de la Sauce Tomate (10 minutes) :
  Dans une petite casserole, chauffez une cuillère d’huile. Faites revenir un oignon haché avec une tomate coupée en dés. Ajoutez du piment, du sel et une pincée de sucre. Laissez mijoter 5 minutes.
 / Service :
  Servez les bananes frites avec la sauce tomate à côté.",
 "alloco.webp",
 "4 bananes plantains mûres, 1 tomate, 1 oignon, Piment, Sel, 500 ml d’huile végétale, Papier absorbant",
 10,
 10,
 20,
 "Poêle ou friteuse : Pour frire les bananes, Casserole : Pour préparer la sauce tomate, Couteau : Pour couper les bananes et légumes, Cuillère en bois : Pour mélanger les ingrédients, Papier absorbant : Pour égoutter l’excès d’huile",
 10,
 1),

 ("Jus de Bissap",
 "Boisson traditionnelle ivoirienne rafraîchissante à base de fleurs d’hibiscus.",
 "Préparation de l'Infusion (15 minutes) :
  Rincez les fleurs d’hibiscus séchées dans de l’eau froide. Faites bouillir 1 litre d’eau et ajoutez les fleurs d’hibiscus. Laissez infuser pendant 10 minutes.
 / Filtrage et Sucrage (5 minutes) :
  Filtrez l’infusion pour retirer les fleurs. Ajoutez du sucre selon votre goût et remuez jusqu’à dissolution complète.
 / Refroidissement et Service (30 minutes) :
  Laissez le jus refroidir au réfrigérateur. Servez-le avec des glaçons.",
 "jus_de_bissap.webp",
 "100 g de fleurs d’hibiscus séchées, 1 litre d’eau, Sucre au goût, Glaçons (optionnel)",
 10,
 15,
 25,
 "Casserole : Pour bouillir l’eau, Passoire : Pour filtrer l’infusion, Pichet : Pour stocker le jus, Verres : Pour servir le jus, Cuillère : Pour mélanger le sucre",
 10,
 7),

  ("Kedjenou de poulet",
     "Un plat ivoirien traditionnel de poulet mijoté avec des légumes et des épices.",
     "Préparation du Poulet (10 minutes).
      Découpez le poulet en morceaux. Assaisonnez avec sel, ail, gingembre et cube d'assaisonnement
     /Préparation des Légumes (10 minutes).
      Coupez les tomates, oignons et aubergines en morceaux
     /Cuisson (30 minutes).
      Placez tous les ingrédients dans une marmite ou un canari avec un peu d'eau. Couvrez hermétiquement et laissez mijoter à feu doux tout en secouant la marmite de temps en temps sans l'ouvrir
     /Service.
      Servez chaud avec du riz ou de l'attiéké.",
     "kedjenou_de_poulet.webp",
     "1 poulet entier, 2 tomates, 2 oignons, 2 aubergines, 1 cube d'assaisonnement, Sel, Épices au goût",
     10,
     30,
     40,
     "Marmite ou canari : Pour la cuisson, Planche à découper : Pour les légumes, Couteau de chef : Pour découper le poulet",
     10,
     2),

     ("Sauce graine avec riz",
     "Une sauce épaisse à base de noix de palme servie avec du riz.",
     "Préparation de la Sauce (20 minutes).
      Faites bouillir les noix de palme et écrasez-les pour extraire la pulpe. Faites chauffer la pulpe avec des morceaux de viande ou de poisson fumé, ajoutez des légumes comme aubergines et piments
     /Cuisson (40 minutes).
      Laissez mijoter la sauce jusqu'à ce qu'elle soit bien épaisse
     /Service.
      Servez la sauce chaude sur du riz blanc.",
     "sauce_graine_riz.webp",
     "500 g de noix de palme, 300 g de viande ou poisson fumé, 2 aubergines, 1 piment, Riz (quantité selon les portions)",
     20,
     40,
     60,
     "Marmite : Pour cuire la sauce, Presse-purée : Pour écraser les noix de palme, Passoire : Pour filtrer la pulpe",
     10,
     2),
     
    ("Placali avec sauce gombo",
     "Un plat ivoirien classique de pâte de manioc accompagnée d'une sauce glissante à base de gombo.",
     "Préparation du Placali (10 minutes).
      Mélangez la pâte de manioc avec de l'eau, chauffez à feu doux en remuant jusqu'à épaississement
     /Préparation de la Sauce Gombo (20 minutes).
      Faites cuire les gombos coupés avec des morceaux de poisson fumé ou de viande. Ajoutez de l'huile rouge et laissez mijoter
     /Service.
      Servez le placali chaud avec la sauce gombo.",
     "akume_poisson_fume.webp",
     "500 g de pâte de manioc, 200 g de gombo, 300 g de poisson fumé ou viande, Huile rouge, Sel",
     10,
     20,
     30,
     "Marmite : Pour cuire le placali, Couteau de chef : Pour couper les gombos, Cuillère en bois : Pour remuer la pâte",
     10,
     2),

      ("Garba",
     "Un plat populaire à base de semoule de manioc et de poisson thon frit.",
     "Préparation du Poisson (15 minutes).
      Faites frire le poisson thon après l'avoir assaisonné avec sel et épices
     /Préparation du Garba (5 minutes).
      Chauffez légèrement le garba pour le rendre moelleux
     /Service.
      Servez le garba accompagné de morceaux de poisson et d'une sauce tomate épicée.",
     "garba.webp",
     "500 g de garba, 300 g de poisson thon, Huile de friture, Sel",
     5,
     15,
     20,
     "Poêle : Pour frire le poisson, Cuiseur vapeur : Pour chauffer le garba",
     10,
     2),

    ("Claclo",
     "Des beignets sucrés à base de bananes bien mûres.",
     "Préparation de la Pâte (10 minutes).
      Écrasez les bananes mûres et mélangez-les avec de la farine et un peu de sucre
     /Friture (15 minutes).
      Faites chauffer l'huile et faites frire des boules de pâte jusqu'à ce qu'elles soient dorées
     /Service.
      Servez chaud avec une boisson fraîche.",
     "claclo.jpg",
     "3 bananes mûres, 200 g de farine, Sucre (au goût), Huile pour friture",
     10,
     15,
     25,
     "Bol : Pour préparer la pâte, Poêle : Pour frire les beignets",
     10,
     6),

    ("Gnangnan (jus de tamarin)",
     "Une boisson rafraîchissante à base de tamarin.",
     "Préparation du Jus (15 minutes).
      Faites tremper la pulpe de tamarin dans de l'eau chaude. Filtrez pour récupérer le jus. Ajoutez du sucre et réfrigérez
     /Service.
      Servez frais avec des glaçons.",
     "gnangnan.jpg",
     "200 g de tamarin, 1 L d'eau, Sucre (au goût), Glaçons",
     15,
     0,
     15,
     "Passoire fine : Pour filtrer le jus, Bol : Pour mélanger le tamarin et l'eau",
     10,
     7),

      ("Sauce claire",
     "Une sauce légère et savoureuse à base de légumes, souvent servie avec du foutou ou du riz.",
     "Préparation des Ingrédients (10 minutes).
      Épluchez et découpez les légumes (aubergines, okras, piments, tomates). Nettoyez et assaisonnez la viande ou le poisson
     /Cuisson (30 minutes).
      Faites bouillir tous les ingrédients dans une marmite avec un peu d’eau et laissez mijoter jusqu’à cuisson complète
     /Service.
      Servez chaud avec du riz ou du foutou.",
     "sauce_claire.jpg",
     "200 g d’aubergines, 100 g d’okras, 2 tomates, 1 piment, 300 g de viande ou poisson, Sel",
     10,
     30,
     40,
     "Marmite : Pour cuire la sauce, Couteau de chef : Pour découper les légumes",
     10,
     2),

    ("Gbofloto",
     "De délicieux beignets sucrés ivoiriens, souvent vendus dans les rues.",
     "Préparation de la Pâte (15 minutes).
      Mélangez la farine, la levure, le sucre et l’eau pour obtenir une pâte homogène. Laissez reposer 1 heure pour qu’elle lève
     /Friture (10 minutes).
      Faites chauffer l’huile dans une poêle profonde. Formez des boules avec la pâte et faites-les frire jusqu’à ce qu’elles soient dorées
     /Service.
      Servez tiède ou froid comme en-cas.",
     "gbofloto.jpg",
     "250 g de farine, 100 g de sucre, 1 sachet de levure boulangère, 250 ml d’eau, Huile pour friture",
     15,
     10,
     25,
     "Bol : Pour préparer la pâte, Poêle : Pour frire les beignets",
     10,
     6),

    ("Sauce aubergine",
     "Une sauce riche et savoureuse préparée avec des aubergines et du poisson fumé.",
     "Préparation des Légumes (10 minutes).
      Épluchez et découpez les aubergines et les tomates
     /Cuisson (25 minutes).
      Faites bouillir les légumes, ajoutez le poisson fumé, et laissez mijoter jusqu’à ce que la sauce soit bien réduite
     /Service.
      Servez chaud avec du riz ou du foutou.",
     "sauce_aubergine.jpg",
     "300 g d’aubergines, 2 tomates, 1 piment, 200 g de poisson fumé, Sel, Huile rouge",
     10,
     25,
     35,
     "Marmite : Pour cuire la sauce, Couteau de chef : Pour découper les légumes",
     10,
     2),

    ("Braisé de poulet",
     "Poulet assaisonné et grillé au charbon, une spécialité ivoirienne.",
     "Préparation du Poulet (20 minutes).
      Nettoyez le poulet et faites une marinade avec ail, gingembre, citron, sel et épices. Laissez reposer 1 heure
     /Cuisson (30 minutes).
      Faites griller le poulet sur un barbecue ou au four jusqu’à ce qu’il soit bien doré
     /Service.
      Servez avec de l’attiéké ou du riz et une sauce épicée.",
     "braise_poulet.jpg",
     "1 poulet entier, 2 gousses d’ail, 1 citron, Gingembre, Sel, Épices au goût",
     20,
     30,
     50,
     "Barbecue ou four : Pour griller le poulet, Bol : Pour la marinade",
     10,
     2),

    ("Soupe de poisson",
     "Un bouillon épicé à base de poisson, parfait pour accompagner des plats de riz.",
     "Préparation du Poisson (10 minutes).
      Nettoyez le poisson et assaisonnez avec sel, citron et piment
     /Cuisson (25 minutes).
      Faites mijoter le poisson dans une marmite avec des légumes (oignons, tomates) et des épices
     /Service.
      Servez chaud avec du riz blanc ou du foutou.",
     "soupe_poisson.jpg",
     "300 g de poisson, 2 tomates, 1 oignon, 1 piment, Sel, Épices au goût",
     10,
     25,
     35,
     "Marmite : Pour cuire la soupe, Couteau de chef : Pour préparer les légumes",
     10,
     2),

    ("Tchep ivoirien",
     "Une variante ivoirienne du célèbre riz gras sénégalais, préparée avec du poisson ou de la viande.",
     "Préparation des Ingrédients (20 minutes).
      Nettoyez et découpez le poisson ou la viande. Préparez les légumes (carottes, choux, aubergines)
     /Cuisson (45 minutes).
      Faites revenir les légumes et la viande dans de l’huile. Ajoutez le riz, de l’eau et laissez cuire à feu doux
     /Service.
      Servez chaud en décorant avec les légumes.",
     "tchep_ivoirien.jpg",
     "300 g de riz, 300 g de viande ou poisson, 2 carottes, 1 aubergine, 1 oignon, 1 cube d’assaisonnement",
     20,
     45,
     65,
     "Marmite : Pour cuire le riz, Couteau : Pour préparer les légumes",
     10,
     2),

    ("Attoukpou",
     "Une galette de maïs fermenté, souvent servie avec une sauce épicée.",
     "Préparation des Galettes (20 minutes).
      Préparez une pâte avec la farine de maïs fermentée et un peu d’eau. Formez des galettes épaisses
     /Cuisson (15 minutes).
      Faites cuire à la vapeur jusqu’à ce que les galettes soient fermes
     /Service.
      Servez chaud avec une sauce tomate ou pimentée.",
     "attoukpou.jpg",
     "250 g de farine de maïs fermenté, 100 ml d’eau, Sel",
     20,
     15,
     35,
     "Cuiseur vapeur : Pour cuire les galettes, Bol : Pour mélanger la pâte",
     10,
     1),

       ("N’tro",
     "Un dessert traditionnel à base de semoule de maïs et de lait sucré.",
     "Préparation (15 minutes).
      Faites cuire la semoule de maïs avec du lait et du sucre jusqu’à obtenir une consistance épaisse
     /Service.
      Servez tiède ou froid avec une touche de vanille ou de cannelle.",
     "ntro.jpg",
     "200 g de semoule de maïs, 500 ml de lait, 50 g de sucre, Vanille (facultatif)",
     15,
     0,
     15,
     "Casserole : Pour cuire la semoule, Fouet : Pour mélanger",
     10,
     6);

INSERT INTO livre (titre, auteur, resume, nombre_page, lien_image, lien_telecharger, annee_publication) VALUES

('Simplissime Les recettes de Noël', 'De Jean-François Mallet', 'Un recueil de recettes pour les repas de Noël, des entrées aux desserts, en passant par les plats principaux.', 250, '../images/livres/Simplissme_les_recettes_de_noel.jpg', 'https://www.google.fr/books/edition/Simplissime_Les_recettes_de_No%C3%ABl_les_pl/94YmEAAAQBAJ?hl=fr&gbpv=1&dq=Les+Recettes+de+No%C3%ABl&pg=PA3&printsec=frontcover', 2020),
('Recettes de cuisine anticholestérol', 'Khelifa Boukelmoune', '', 147, '../images/livres/Recettes_de_cuisine_anticholestérol.jpg', 'https://www.google.fr/books/edition/_/pO5fDgAAQBAJ?hl=fr&gbpv=0', 2017),
('Recettes de Cuisine Traditionnelle de Légumes', ' Auguste Escoffier, Pierre-Emmanuel Malissin ', ' Auguste Escoffier fut un des plus grands cuisiniers du siècle dernier, son livre phare "Ma cuisine" édité en 1934 est toujours la bible de référence des professionnels de la cuisine.', 154, '../images/livres/Recettes_de_Cuisine_Traditionnelle_de_Légumes.jpg', 'https://www.google.fr/books/edition/Recettes_de_Cuisine_Traditionnelle_de_L/6JbLAgAAQBAJ?hl=fr&gbpv=1', 2014),
('Ma cuisine avec 4 ingrédients', 'Pascale Naessens ', "Maigrir n'a jamais été aussi simple. Mais le but de ce livre, c'est avant tout d'offrir des recettes délicieuses. Le manque de temps ne peut plus être une excuse pour ne pas cuisiner des repas sains et savoureux", 224, '../images/livres/Ma_cuisine_avec_4_ingrédients.jpg', 'https://www.google.fr/books/edition/Ma_cuisine_avec_4_ingr%C3%A9dients/MzZTEAAAQBAJ?hl=fr&gbpv=1', 2021),
('3 fois par jour: Desserts', 'Marilou, Marilou Champagne, Alexandre Champagne', 'Manger moins de viande, sans juger ceux qui en consomment moins ou plus que nous, est-ce si utopique ? Se poser des questions, vouloir ouvrir nos yeux', 279,'../images/livres/3_fois_par_jour_dessert.jpg', 'https://books.google.fr/books?id=dRosuwEACAAJ&newbks=0&hl=fr&source=newbks_fb&redir_esc=y',2014),
('La cuisine de Roger et Liliane', 'Gary Mihaileanu', 'Conçu comme un carnet de cuisine interactif, il contient plus de 60 recettes mais aussi des QR codes qui vous mèneront vers une playlist pour cuisiner en musique et vers des vidéos dévoilant des tours de mains que Liliane, anciennement chef de son restaurant, gardait jusqu’à présent secrets ! Vous plongerez également dans leur histoire d’amour et découvrirez leur périple depuis leur Tunisie natale.', 208, '../images/livres/la-cuisine_de_roger_et_liliane.jpg', 'https://www.google.fr/books/edition/La_cuisine_de_Roger_et_Liliane/3aBEEAAAQBAJ?hl=fr', 2021),

('Gourmande et futée : une recette peut en cacher une autre', 'Nathalie de Loeper', "Vous êtes GOURMANDE, vous appréciez les bons petits plats mitonnés, mais vous détestez être prise au dépourvu et avez une sainte horreur du gaspillage. Alors, vous vous organisez ! Et comme vous êtes futée, vous suivez les conseils de Nathalie qui vous révèle comment une recette peut en cacher une autre. En effet, dans GOURMANDE ET FUTÉE, vous trouverez les secrets de 50 savoureuses « recettes à tiroir» qui, comme par magie, se transforment en 50 autres recettes tout aussi délicieuses. Le truc ? Nathalie vous le dévoile en vous apprenant à réserver les ingrédients à l'avance pour ne plus subir les restes mais les prévoir. Et elle va plus loin, car les règles d'or de la futée s'appliquent dès le moment des courses. Elle explique comment acheter des produits frais, reconnaître les vraies ...", 212, '../images/livres/Gourmande_et_futée.jpg', 'https://www.google.fr/books/edition/Gourmande_et_fut%C3%A9e_une_recette_peut_en/cqz_EAAAQBAJ?hl=fr&gbpv=0', 1997);

/* insertion pour le jeu de quiz */
INSERT INTO categorie_question (titre, description, image) VALUES
('Ingrédients et Nutrition',
 "Cette catégorie explore les différents ingrédients utilisés en cuisine, leurs propriétés nutritionnelles, et comment ils contribuent à une alimentation équilibrée. Vous y trouverez des informations sur les bienfaits des aliments, les valeurs nutritives, et des conseils pour choisir et utiliser des ingrédients sains.",
 'ingredients_nutrition.jpg'
),

('Technique Culinaire et Préparation',
 "Découvrez les techniques de base et avancées de la cuisine, des méthodes de préparation aux astuces pour réussir vos recettes. Cette catégorie couvre les compétences essentielles comme la découpe, la cuisson, et la présentation des plats, ainsi que des conseils pour améliorer vos compétences culinaires.",
 'technique_culinaire.jpg'
),

('Cuisine du Monde',
 "Partez à la découverte des cuisines du monde entier, de la Méditerranée à l'Asie, en passant par l'Amérique latine et l'Afrique. Explorez les traditions culinaires, les ingrédients typiques, et les recettes emblématiques de chaque région. Cette catégorie vous invite à un voyage gastronomique riche en saveurs et en cultures.",
 'cuisine_du_monde.jpg'
),

('Ajouter des questions😜',
 "Avec cette fonction, vous pouvez ajouter de nouvelles questions pour les autres utilisateur. C'est simple et rapide !",
 'ajouter_des_questions.jpg'
);

INSERT INTO questions (question, id_categorie) VALUES
("Quel ingrédient est une source de protéines dans une salade équilibrée ?", 1),
("Quel ingrédient est riche en fibres et recommandé pour une alimentation équilibrée ?", 1),
("Quel aliment est une bonne source de bons gras pour un repas équilibré ?", 1),
("Quelle méthode de cuisson préserve le mieux les vitamines des légumes ?", 2),
("Quelle étape est essentielle pour réussir une pâte brisée ?", 2),
("Pour éviter de trop saler une soupe, que peut-on faire ?", 2),
("Quel plat asiatique est souvent considéré comme équilibré ?", 3),
("Quel plat méditerranéen est connu pour être équilibré ?", 3),
("Lequel de ces plats est un exemple de repas équilibré ?", 3),
("Quel ingrédient est une bonne source de vitamine C ?", 1),
("Quel ingrédient est riche en antioxydants ?", 1),
("Quelle technique est utilisée pour faire une mayonnaise maison ?", 2),
("Quelle méthode de cuisson est idéale pour les viandes rouges ?", 2),
("Quel plat africain est souvent considéré comme équilibré ?", 3),
("Quel plat latino-américain est connu pour être équilibré ?", 3);

INSERT INTO reponse_proposition ( id_question, proposition, est_correcte) VALUES
(
1,
"Les noix.Les tomates.Les épinards.Les pommes",
"Les noix"
),

(
2,
"Le riz blanc.Les lentilles.Le beurre.Le fromage",
"Les lentilles"
),

(
3,
"L'avocat.Le pain blanc.Le beurre salé.Le soda",
"L'avocat"
),

(
4,
"Friture.Cuisson à la vapeur.Cuisson au four.Ebullition prolongée",
"Cuisson à la vapeur"
),

(
5,
"Ajouter du sucre à l'eau de cuisson.Laisser la pâte reposer au réfrigérateur.mélanger avec un fouet électrique.Cuire directement sans repos",
"Laisser la pâte reposer au réfrigérateur"
),

(
6,
"Ajouter une pomme de terre dans la cuisson.Cuire à feu vif.Ajouter du vinaigre.Servir immédiatement",
"Ajouter une pomme de terre dans la cuisson"
),

(
7,
"Le ramen instantané.Le poulet Teriyaki avec riz et légumes sautés.Les tempuras de crevettes.Le riz frit avec saucisses",
"Le poulet Teriyaki avec riz et légumes sautés"
),

(
8,
"La moussaka(légumes, viande hachée, béchamel).La pizza 4 fromages.Le kebab avec sauce blanche.Les churros au chocolat",
"La moussaka(légumes, viande hachée, béchamel)"
),

(
9,
"Burger avec frites.Riz, poulet grillé et légumes vapeur.Pizza fromage et pepperoni.Pâtes à la carbonara",
"Riz, poulet grillé et légumes vapeur"
),

(
10,
"Le lait.Les oranges.Le pain.Le riz",
"Les oranges"
),

(
11,
"Le chocolat noir.Le sucre.Le beurre.Le sel",
"Le chocolat noir"
),

(
12,
"Cuisson au four.Friture.Émulsion.Bouillir",
"Émulsion"
),

(
13,
"Cuisson à la vapeur.Grillade.Friture.Cuisson au four",
"Grillade"
),

(
14,
"Le couscous.Le jollof rice.Le poulet Yassa.Le foufou",
"Le couscous"
),

(
15,
"Les tacos al pastor.Le ceviche.Les empanadas.Le churrasco",
"Le ceviche"
);





