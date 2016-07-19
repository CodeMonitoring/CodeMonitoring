.. _features:

Features
========

Implemented
-----------

The following features are currently implemented.


Parse file based information
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

.. todo:: Add ref to documentation here.

Parsing is possible and documented at ... . It's possible to write custom parser. 

Currently a parser for ``checkstyle`` is provided inside ``CodeMonitoring.Parser.Checkstyle``. The
parser is registered and configured to parse :file:`.xml`-files with Checkstyle 2.5.x, like
generated through `PHP CodeSniffer`_.

Nothing is done with the parsed information yet, as no importer exists, see
:ref:`features-future-import-files`.

.. _features-future:

Future
------

The following features are currently planned for the future. With our current knowledge, that's
everything needed at the moment to expand and built arbitrary useful software based on our
framework.

.. _features-future-import-files:

Import file based information
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Parse different file based outputs like phpunit, phpmd, phpcs.  At beginning, only import "file
based information", which means information like the above tools generate. Each information is
related to a specific file and mostly a line.

Output like phploc is project based and provides overall information not related to specific files.
This will be another feature.

.. _features-future-import-project:

Parse and import project based information
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Parse output of tools like phploc, which is project based and provides information about the
complete project, not specific files.

.. _features-future-display:

Display gathered information
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

First basic display via charts inside a web gui. This should be done in a new package that will grow
and provide an API for further development. The API should ease the integration of "widgets" and
such, so packages will be possible that will provide a parser, importer and widgets and provide full
integration for things like Wordpress, TYPO3, Drupal, Apache Logs, Github Issues, Git, etc.

Overall *features* to keep in mind during development
-----------------------------------------------------

The following features can not be implemented, but should be kept in mind during development.

In general, everything that is provided as a feature, should also be expendable by 3rd parties.
This is especially true for:

- Allow imports through 3rd parties

- Allow parser from 3rd parties

- Allow graphs from 3rd parties

But also for things like:

The following should already be possible, once the dependencies are implemented, as we use Flow
Framework. All the developers have to do, is to provide a package implementing the features. All
Information are already available.

- Possibility to provide arbitrary statistics, we don't have in mind yet. Things that might look out
  of scope like comparison between commits and projects tasks.

- Provide access to all existing information inside the system, so 3rd parties can process them as
  they wish. E.g. create reports via E-Mail. Provide new displayed information aggregated from
  existing ones.

.. _PHP CodeSniffer: https://github.com/squizlabs/PHP_CodeSniffer
