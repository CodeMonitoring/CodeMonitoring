.. _extending-parser:

Custom parser
=============

To provide your own parser, you have to create a new PHP Class implementing
``CodeMonitoring\Framework\Parse\ParserInterface``. That's all you have to do.

The interface defines the following methods:

.. literalinclude:: ../../../Classes/CodeMonitoring/Framework/Parse/ParserInterface.php
   :lines: 32-74
   :dedent: 4

.. _extending-parser-eel:

Use Eel expression for ``canHandle``
------------------------------------

In addition you can use the trait ``CodeMonitoring\Framework\Parse\EelParsingDetectionTrait`` to
implement the ``canHandle`` method. The trait will implement this method and provide the property
``$eelExpression`` which can be configured through :file:`Objects.yaml`.

An example can be found in *CodeMonitoring.Parser.Checkstyle*. Add the following to your parser
class::

    use EelParsingDetectionTrait;

And the following to your :file:`Object.yaml`:

.. code-block:: yaml

    CodeMonitoring\Parser\Checkstyle\Parser\CheckstyleParser:
        properties:
            eelExpression:
            value: 'file.fileExtension == "xml" && String.substr(lines[1], 1, 10) == "checkstyle" && String.substr(lines[1], 21, 3) == "2.5"'

Adjust the first line to match your fully qualified class name.
The expression will be parsed through the trait and result in ``true`` or ``false`` depending on
expression and file.

The above expression will check that the extension of file is equal to ``xml`` and that the second
line contains ``checkstyle`` in version ``2.5``.

Currently the following context is provided to parse the expression:

.. literalinclude:: ../../../Classes/CodeMonitoring/Framework/Parse/EelParsingDetectionTrait.php
   :lines: 56,58-59
   :dedent: 12

For more information about *Eel* check out the :ref:`official documentation about Eel<flow:eel>`.
