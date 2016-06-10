.. _importing:

Importing
=========

To get started, you need to import data from some format like *checkstyle*.

The import process will use an importer together with a parser. The parser will parse the given
file, while the importer will use the result for further process, e.g. calculations and persistence.

.. uml:: ../Uml/Import.uml

At some point we will introduce a queue to process the files.
