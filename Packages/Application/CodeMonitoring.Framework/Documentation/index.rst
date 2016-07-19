CodeMonitoring |version| Documentation
======================================

This documentation covering version |release| has been rendered at: |today|

This is the documentation for the whole project.

Introduction
------------

PHP Project to help developers maintain there code quality by using specialized tools for analyzing,
but a single tool to visualise and monitor the results.

In general this tool can be used to monitor everything. A CLI call is provided to parse and import
output. Different parser can be provided, also different importer can be provided.

Target Group of this project
----------------------------

Developers at first, with easy to use CLI access. In the future also Companies
to monitor the overall code quality across multiple projects, or to monitor anything else.

Current state
-------------

It's a very early state, mostly about documenting ideas and concepts.

Also some parts are kick started to be implemented. Take a look at :ref:`roadmap`.

Goal
----

The target of this project is to provide a well designed web GUI for Code
monitoring written in PHP. While this projects is based on PHP and will itself
support PHP out of the box, further languages will be possible by extensions.

The project will parse output of further software and display the results as a
web GUI. By providing the understandable output you can integrate everything.
Also it will be possible to write own parsers to support further formats in the
future.

All results will be parsed via CLI and persisted.
Code Monitoring will analyze the data and display it with filter and graphs.

Also, due to the concepts and code, it's possible to do anything you want with the information, e.g.
send email, twitter, instead of persisting and displaying the information.

Displaying information as a website is just a package itself and not needed. You can use
Codemonitoring to monitor access logs, other logs, phpunit results or whatever and do whatever you
want with the output, like "if this then that". All you have to do is to provide something to parse,
a parser to parse the file, and to provide an importer to do anything with the parsed information.

Some parser and importer will be provided, some will hopefully be developed by other developer in
the future, and the rest is up to you.

.. toctree::

   Install
   Usage/Index
   Features/Index
   Processes/Index
   Development/Index
