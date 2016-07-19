.. _roadmap:

Roadmap
-------

There is no timeline, just the order in which features will, at this moment, be implemented.

#. Implement first example parser and importer, to kick start framework to deal with these tasks and
   provide an example implementation.
   Also provide documentation. After this is implemented, there is already a single standard and
   others can work with imported information.

#. Implement first output based on imported information. Provide first Views and GUI.

#. Improve eel parsing trait:

   .. literalinclude:: ../../Classes/CodeMonitoring/Framework/Parse/EelParsingDetectionTrait.php
      :lines: 32-35
      :dedent: 3

#. Provide further example packages to show what is possible and how to implement it. E.g.:

    #. Provide Package to import Github issues and display them via Web GUI Package.

    #. Provide E-Mail importer with rule set via configuration to allow sending e-mails for all kind
       of imports.

Once we have the first two points finished, an alpha version 1.0.0 will be released that should be
ready to use.
