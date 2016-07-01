# Google Domains DynDNS
Google Domains Dynamic DNS

# Setup
I highly recomend setting up a CRON job attached to this file, running every time your DNS records TTL is up. Please make sure that the `dnydns.log` is writable. After that, it will responsibly keep the DNS record up to date.

# Google Domains
Going too [Google Domains](https://domains.google.com) click on Configure DNS for the domain you wish to use. Under **Synthetic records* you'll see *Dynamic DNS* as an option. You can use `@` to use the whole domain too dynamically point to an IP address, or you can setup a sub domain. Once you've *Add*ed the record, you'll be given a username and password. Click on the arrow pointing towards Dnymaic DNS, and you'll see the username and password attached to your record and click *View Credentials*. Copy this information into the [Global Defines](#global-defines) below.

# Global Defines
`const HOSTS` Is an array of arrays containing the following information.

`[`

`[`

  `HOST` Hostname, fully qualifed domain name.

  `MAIL` E-Mail, your email address.

  `USER` Username from the *View Credentails* field.

  `PASS` Password from the *View Credentails* field.

`]`

`]`
