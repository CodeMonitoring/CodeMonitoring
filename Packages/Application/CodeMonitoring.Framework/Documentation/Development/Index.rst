.. _development:

Development
===========

At this very early state everything is one repository, even if multiple packages already exist.
As soon as first packages get a good state and work together, they will be splitted into there own
repositories.

This allows to handle them different and independent. Also they will get their own documentation.

.. _extending:

Extending
---------

The following sections provide documentation how to extend the framework by providing your own
parser, importer and such.

In general you have to build a custom Flow package containing your code like parser. Generating this
packages is not part of this documentation, but can be found at `Flow Docs`_.

.. toctree::

   Extending/Parser
   Extending/Importer

.. include:: Roadmap.rst

.. _Flow Docs: https://flowframework.readthedocs.io/en/stable/
