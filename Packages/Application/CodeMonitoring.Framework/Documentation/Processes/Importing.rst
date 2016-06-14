.. _importing:

Importing
=========

To get started, you need to import data from some format like *checkstyle*.

The import process will use an importer together with a parser. The parser will parse the given
file, while the importer will use the result for further process, e.g. calculations and persistence.

The parser will return the parsed information in a defined format to the importer. The importer will
get the configuration by user and handle the information. E.g. he will raise severity for some
issues, or ignore some issues.
He will also, depending on configuration, persist the parsed results without modifications. This
allows to reimport parsed information onces the config changes. So you can compare the history of a
file or project with adjusted configuration and allows comparison.
So you can test a new configuration before applying it.

.. image:: /Images/Uml/Import.svg

It's up to the ``Importer`` how to handle the delivers information from parser and what
configuration options are available.

At some point we will introduce a queue to process the files. To speed up the CLI Access and use a
non blocking process.

Possible Improvements
---------------------

To ease integration of new importers, we can provide the following:

A **trait** providing the priority, with property and getter. The package can attach it to parser *and*
importer and configure priority via :file:`Objects.yaml`.

Also provide **Eel** for detecting whether file can be parsed or imported?
Provide some language like ``lineXContains("string")``, ``lineXStartsWith("string")``, or
``fileNameMatches("string")``, stuff like that.

Use different **Backends** attachable to Importer? Things like "mail", "log", "db", ...

Also provide some **Events**, either via AOP or Signal Slots. Enabling developers to register things
like an email if a specified conditions occurs, e.g. more then x vulnerabilities against CGL.
