# Eko-Magic

Cette librairie est un component de `Ekolo Framework`. Elle permet d'utiliser les méthodes magiques de php pour créer des méthodes et attributs magiques.

## Installation

Pour l'installer vous devez à avoir déjà composer installé. Si ce n'est pas le cas aller sur  [Composer](https://getcomposer.org/)

```bash
$ composer require ekolo/eko-magic
```

## API

Cette librairie contient deux 2 classes, `Magic` et `ParameterBag` la dernière hérite l'autre.

* `Magic` permet de générer des méthodes et des attibuts magiques automatiquement
* `ParameterBag` permet d'ajouter, modifier, supprimer et récuperer des valeurs des variables

Exemple
```php
<?php
    require __DIR__.'/vendor/autoload.php';

    use Ekolo\Component\EkoMagic\ParameterBag;

    $parameters = new ParameterBag([
        'id' => '1',
        'nom' => 'Etokila',
        'prenom' => 'Diani',
        'sexe' => 'M'
    ]);

    echo $parameters->nom(); // Etokila
```

### ParameterBag::add(array $parameters = [])

Permet de rajouter des variables

`$parameters` Les variables à rajouter

```php
$parameters->add([
    'profession' => 'Medecin',
    'age' => 'adulte'
])

echo $parameters->age(); // adulte
```

### ParameterBag::get($key)

Permet de renvoyer la valeur d'une variable

`$key` Le nom de la variable à appeler

```php
echo $parameters->get('prenom'); // Diani
```

### ParameterBag::get($key, $default = null)

Permet de renvoyer la valeur d'une variable

`$key` : C'est le nom de la clé de la variable à récuperer
`$default` : C'est la valeur par défaut au cas où cette variable n'existe pas

```php
echo $parameters->get('prenom'); // Diani
```

### ParameterBag::set($key, $value)

Permet de modifier ou de créer une nouvelle variable

`$key` Le nom de la clé de la variable à créer ou à modifier
`$value` La valeur à mettre à jour

```php
echo $parameters->get('prenom'); // Diani
```

### ParameterBag::all()

Renvoi toutes les variables

```php
print_r($parameters->all());
/*
    Array
    (
        [id] => 1
        [nom] => Etokila
        [prenom] => Diani
        [sexe] => M
        [proffession] => Medecin
        [age] => adulte
    )
*/
```

### ParameterBag::keys()

Renvoi toutes les clés de variables

```php
print_r($parameters->keys());
/*
    Array
    (
        [0] => id
        [1] => nom
        [2] => prenom
        [3] => sexe
        [4] => proffession
        [5] => age
    )
*/
```

### ParameterBag::replace(array $parameters = [])

Remplace l'ancien tableau contenant des variables par un nouveau

`$parameters` Le tableau des nouveaux paramètres à remplacer

```php
$parameters->replace([
    'id' => '2'
    'nom' => 'Isao',
    'prenom' => 'Obed Sara Tabitha'
])
```

### ParameterBag::has($key)

Vérifie si la variable dont la clée passée en paramètre existe

`$key` Le nom de la variable en question

```php
echo $parameters->has('nom') ? "'nom' existe" : "N'existe pas"; // 'nom' existe
```

### ParameterBag::remove($key)

Supprime la varible passée en paramètre

`$key` Le nom de la variable en question

```php
$parameters->remove('prenom');
echo $parameters->has('prenom') ? "'nom' existe" : "N'existe pas"; // N'existe pas
```

### ParameterBag::count()

Renvoi le nombre de variables

```php
$parameters->count(); // 3
```

### ParameterBag::generateAttributes()

C'est une méthode `private` qui permet de générer des attributes magiques automatiquement.

> Attention pour les clés qui ont de tiret `-`, là le génarateur des attributs et des méthodes ne les prend pas en charge, du cout ces valeurs ne peuvent être récuperées que par `get('User-agent')` ou `params('user-name')` ou `body('encore-ici')'` ainsi de suite