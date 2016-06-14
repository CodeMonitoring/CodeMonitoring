.. _features:

Features
========

Implemented
-----------

The following features are currently implemented.

Future
------

The following features are currently planned for the future.

Parse and import file based information
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Parse different file based outputs like phpunit, phpmd, phpcs. Make implementation open to make it
easy to provide further packages with further implementations to make it possible to parse all
available formats, at least by own implementations.

At beginning, only import "file based information", which means information like the above tools
generate. Each information is related to a specific file and mostly a line.

Output like phploc is project based and provides overall information not related to specific files.
This will be another feature.

Parse and import project based information
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Parse output of tools like phploc, which is project based and provides information about the
complete project, not specific files.

Display gathered information
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

First basic display via charts inside a web gui.


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

