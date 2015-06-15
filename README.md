BitdepotClientBundle - Work In Progress
========================

When bitcoin meet Arnold Schwarzenegger.

See the [API Project](https://github.com/dizda/Bitdepot).

## Setup

Install with Composer

    composer require dizda/bitdepot-client-bundle

## Configuration

Add this to your `config.yml`:

    dizda_bitdepot_client:
        base_url:   %bitdepot_endpoint%    # Correspond to the bitdepot api server
        app_id:     %bitdepot_app_id%
        app_secret: %bitdepot_app_secret%

## License

MIT Licensed, see LICENSE.

