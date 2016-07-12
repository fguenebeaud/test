Test Potogan
============

Ceci est l'énoncé du test d'application au poste de Développeur(se) Web Potogan.

Vous devrez, dans le temps imparti, créer un formulaire d'inscription à une conférence.
Le formulaire doit comporter les éléments suivants
  - Noms
  - Prénom
  - Email
  - Mobile
  - Pseudonyme
  - Twitter
  - Facebook
  - Avatar

Les éléments marqués (BONUS) ne sont pas obligatoires, ils joueront en votre faveur si le temps vous le permet 

Tous les éléments doivent avoir les éléments de validation suivants
  - Nom: Requis
  - Prénom: Requis
  - Email: Requis, Valide, Unique
  - Mobile: Requis, Valide
  - Pseudonyme: Facultatif, Unique
  - Twitter: Facultatif, Commence par un @, (BONUS) Existe en réel (http://twitter.com/NOM)
  - Facebook: Facultatif, URL, (BONUS) Existe (http://facebook.com/NOM)
  - Avatar (BONUS): Facultatif, Image, Taille maximum 420px x 420px

Ce formulaire doit être mappé dans une entité et être persistée dans une base de données de votre choix.
Le formulaire se doit d'être un minimum mit en forme
Le champ Avatar (BONUS) doit être envoyé dans le dossier `/web/upload`

Vous avez à votre disposition, et pré-installé:
  - Un bundle Potogan\TestBundle\
  - Un controller de base
  - Une vue avec le framework CSS Bootstrap
  - Doctrine migrations bundle

Une fois terminé, vous devrez créer une Pull Request sur GitHub.

Vous êtes libres d'ajouter les librairies que vous désirez tant qu'elles sont dans le cadre du projet
