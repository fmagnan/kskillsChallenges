Découpage de cubes
------------------
Ouf ! Vous avez trouvé quelqu'un pour vous emmener aux [Symfony Live Paris]. Le rendez-vous est pris avec le conducteur, et c'est parti. En mettant votre valise dans le coffre, vous remarquez que celui-ci est rempli de morceaux de bois.

Vous lui demandez ce qu'il veut faire de tout ce bois, et il vous répond qu'il voudrait les découper en cubes de tailles identiques pour ensuite les sculpter en objets décoratifs.
Il veut absolument utiliser tout le bois qu'il a à disposition et veut obtenir les cubes les plus gros possibles.
 
Vous vous proposez de l'aider à déterminer quelle taille de cube il sera capable de produire, et combien il pourra en produire.
Chaque morceau de bois a une dimension exprimée en largeur l , hauteur h  et profondeur p.
Un cube a une largeur, une hauteur et une profondeur identique (l = h = p).
 
Si par exemple il n'y a qu'un morceau de bois dans le coffre de taille 4x4x2, les plus gros cubes qu'il sera capable de produire auront une taille de 2x2x2 et il pourra en produire 4.
 
Si 2 morceaux de bois respectivement de taille 4x2x2 et 1x1x1 sont disponibles, les plus gros cubes de taille identique feront une taille de 1x1x1 et il y en aura 17.

Vous devez écrire un programme qui détermine la taille maximum que pourront avoir les cubes, ainsi que le nombre de cubes qui seront produits. 
 
Entrée de la fonction
-------------------
La première ligne contient un nombre entier N compris entre 1 et 10 inclus, indiquant le nombre de morceaux de bois dans le coffre.
 
S'en suivent N lignes représentant chacune un morceau de bois sous la forme l;h;p
 
l, h et p sont des nombres entiers compris entre 1 et 100 inclus.

Sortie de la fonction
-------------------
Votre fonction doit retourner le résultat sous la forme T;NB
 
où T représente la taille maximum des cubes qui pourront être produits (où T représente indifféremment la largeur, la hauteur ou la profondeur dans la mesure ou ces 3 dimensions sont identiques).
et NB représente le nombre de cubes qui pourront être produits.
 
T et NB sont des nombres entiers positifs.
Exemple
Entrée

2
4;2;2
1;1;1

Sortie

1;17

[Symfony Live Paris]: http://paris2013.live.symfony.com/
