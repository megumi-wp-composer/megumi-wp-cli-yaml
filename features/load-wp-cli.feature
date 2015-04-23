Feature: Components of the WP-CLI commands

  Scenario: WP-CLI loads for your tests
    Given a WP install

    When I run `wp eval 'echo "Hello world.";'`
    Then STDOUT should contain:
      """
      Hello world.
      """

  Scenario: Example test.
    Given a WP install

    When I run `wp yaml hello miyauchi`
    Then STDOUT should be:
      """
      Success: Hello, miyauchi!
      """
