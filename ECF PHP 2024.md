# ECF : CCP 2 & 3 - PHP
  
Pour cette évaluation, vous avez la possibilité de vous aider de l'ensemble des notions acquise en cours de formation, vous avez le droit de vous aider d'internet. L'intervenant est à votre disposition en cas d'incompréhension.
  

## Cadre & Explication

  
Félicitation, vous venez d'intégrer notre équipe de développement PHP. Notre entreprise travail au développement d'une solution de Forum en ligne autour de la thématique de l'actualité mondiale. Ce projet, permettra à notre groupe médias de fédérer des utilisateurs autour de notre marque.
  

## Consigne

Un stagiaire à commencer le développement de notre projet, cependant, il n'est pas parvenu à tout réaliser. En vous appuyant sur le code déjà réalisé, nous avons besoin d'obtenir une version finalisé de l'application à présenter aux investisseurs à la fin de la journée.

### 1. Modélisation (3pts) :  
  
Notre stagiaire n'étant pas concepteur, n'a pas su réaliser la modélisation MERISE de notre base de donnée.
Pouvez-vous nous faire parvenir votre MCD, MLD et MPD de notre projet ?
Les règles de gestion sont les suivantes :

 1. Les utilisateurs ont la possibilité de s'inscrire avec leur prénom, nom, email et mot de passe. Ils ont une ROLE_USER par défaut et peuvent répondre a des "POST" via des "MESSAGE". Les Administrateurs ont un ROLE_ADMIN et ont la possibilité de créer des "POST" afin de lancer de nouvelles discussions.
 2. Un post est représenté par son titre et sa description. Il est rédigé par un utilisateur ayant les droits nécessaires. Un post est obligatoirement rattaché à un 'FORUM' qui fait office de catégorie. Ex : Politique, Economie, Société, etc ...
 3. Un utilisateur à la possibilité de rédiger un 'MESSAGE' a propos d'un POST afin d'apporter son avis et ainsi discuter sur le sujet. Un POST aura alors plusieurs 'MESSAGE' de plusieurs 'USER'. Un message est représenter par un contenu texte.

> REMISE : Vous ferez une capture d'écran de votre modélisation que vous mettrez dans le dossier `_Modélisation`

### 2. Base de donnée & Requête SQL (5pts)

Notre stagiaire n'ayant pas une grande expérience du SQL n'est pas parvenu à construire les différentes requêtes. Il vous incombe donc la charge de les réaliser afin de rendre fonctionnelle le projet.

> Un export de la base de donnée est à votre disposition dans le dossier `_Export`. Appuyez-vous dessus.

Vous devez réaliser les requêtes SQL se trouvant des les fichiers suivants :

 - helpers/forum.helper.php
 - helpers/post.helper.php

### 3. Finalisation du développement (8pts)

Notre stagiaire n'a pas reussi à terminer à temps le développement. En vous appuyant sur le code déjà réaliser, vous devez rendre entièrement fonctionnelle les pages suivantes : 

 1. index.php
 2. forum.php
 3. post.php
 4. creer-un-post.php `(Nécessite d'être authentifié avec un ROLE_ADMIN)`

### 3. Oublie de dernière minute (4pts)

Nous allions oublié, après avoir fait un point aujourd'hui avec notre board, avant notre réunion de ce soir, nous avons impérativement besoin que les utilisateurs ayant un ROLE_USER puisse créer des messages depuis la page `post.php`...

Notre stagiaire à malheureusement complètement oublié cette fonctionnalité. Nous comptons sur vous pour la mener à bien.

## Remise de l'ECF

Vous déposerez votre projet au format ZIP ou 7z sur discord dans un channel : `#remise-ecf`
Vous inclurez votre code & votre modélisation;

---

Bon courage,
Written with ❤️ by [Hugo LIEGEARD](https://github.com/hugoliegeard).
