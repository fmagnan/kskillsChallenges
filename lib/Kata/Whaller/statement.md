Degré de séparation
------------------

Vous souhaitez mener une petite étude sur les données de Whaller afin de déterminer le degré de
séparation moyen entre 2 individus inscrits.

Le degré de séparation se définit comme suit :
 * Si 2 individus sont dans un même groupe, ils sont considérés comme de degré 1.
 * Si 2 individus ne se connaissent pas mais ont une relation en commun, ils sont considérés comme de degré 2.
 * Et s'ils doivent passer par 2 relations pour pouvoir être reliés, ils sont considérés comme de degré 3.
 Ex. Pierre connaît Manu qui connaît Seb qui connaît Ben. Pierre et Ben ont donc un degré de séparation de 3.

Vous devez déterminer quel est le degré de séparation entre 2 individus donnés, à partir de la liste des relations
qui vous est fournie.

Si plusieurs solutions sont possibles pour relier ces 2 individus, le degré de séparation à retenir correspond
à la solution nécessitant le moins de relations.

Entrée de la fonction
---------------------

Une 1ère ligne contenant ces 3 informations respectives séparées par un point-virgule:

 * Le nom du 1er individu sous la forme d'une chaîne de caractères comprenant entre 1 et 20 caractères inclus
 * Le nom du 2ème individu sous la forme d'une chaîne de caractères comprenant entre 1 et 20 caractères inclus
 * Un nombre entier N compris entre 1 et 100 inclus, représentant le nombre de relations

Ex. Pierre;Ben;12

S'en suivent N lignes contenant les relations entre 2 individus séparés par un point-virgule.

Ex. Manu;Seb

L'ordre des individus n'a pas d'importance: Manu;Seb équivaut à Seb;Manu
Sortie de la fonction

Votre fonction doit retourner un nombre entier positif représentant le degré de séparation entre
les 2 individus fournis en 1ère ligne en entrée.
Exemple
-------

**Entrée**

```csv
Pierre;Ben;12
Sophie;Pat
Jacques;François
Manu;Seb
Pierre;Claire
Seb;Ben
Pierre;Jacques
Jacques;Tonio
Sophie;Tonio
Pat;François
François;Sophie
Manu;Pierre
Mathilde;Claire
```

**Sortie**

```csv
3
```