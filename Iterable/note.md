## What is This About

- php iterable data types are: Object and Iterable
- Generator is a good option to generate iterator
- Take CSV import as example to show how generator works efficient

## php Object

- properties that can be accessed are able to use through `foreach()`

## Words Reference

- iterable

  - Alias for array|Traversable
  - Everything that can be iterate with `foreach()`
  - Converted to array by `iterator_to_array()`

- Traversable

  - Iterator  
    Generator
  - IteratorAggregate  
    Interface that make Iterator(Traversable)

- Generator
  - Make iterator easily: only need to `yield`
  -

## Environments

- Windows
- WSL2 Ubuntu
- php 8.2.1
