CodeMonitoring |version| Documentation
======================================

This documentation covering version |release| has been rendered at: |today|

This is the documentation for the whole project.

Introduction
------------

PHP Project to help developers maintain there code quality by using specialized tools for analyzing,
but a single tool to visualise and monitor the results.

Target Group of this project
----------------------------

Developers at first, with easy to use CLI access. In the future also Companies
to monitor the overall code quality across multiple projects.

Current state
-------------

Nothing is achieved yet. It's a very early state, mostly about documenting ideas and concepts.

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

All results will be parsed via CLI (perhaps also copy and paste via web form?)
and persisted.
Code Monitoring will analyze the data and display it with filter and graphs.

.. toctree::

   Install
   Features/Index
   Processes/Index
   Development/Index
