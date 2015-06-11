# Google Domains DynDNS
Google Domains Dynamic DNS

# Setup
I highly recomend setting up a CRON job attached to this file, running every time your DNS records TTL is up. Please make sure that the `ipOnFile.txt` is writable. After that, it will responsibly keep the DNS record up to date.

# Google Domains
Going too [https://domains.google.com](Google Domains) click on Configure DNS for the domain you wish to use. Under **Synthetic records* you'll see *Dynamic DNS* as an option. You can use `@` to use the whole domain too dynamically point to an IP address, or you can setup a sub domain. Once you've *Add*ed the record, you'll be given a username and password. Click on the arrow pointing towards Dnymaic DNS, and you'll see the username and password attached to your record and click *View Credentials*. Copy this information into the [#Global Defines](global defines) below.

# Global Defines
`const USER` Username from the *View Credentails* field.

`const PASS` Password from the *View Credentails* field.

`const HOST` Hostname, fully qualifed domain name.

`const MAIL` E-Mail, your email address.
