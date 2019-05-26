#!/usr/bin/env bash
# Use for running the unit tests.
# Ensures that unit tests always use the same database.
#
#

export DB_DATABASE=./database/unit-test-database.sqlite

./vendor/bin/phpunit

exit $?

