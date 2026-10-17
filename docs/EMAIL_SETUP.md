# Email setup

Open **Admin → Email settings** (`/admin/settings/email`) and enter SMTP host, port, encryption, credentials, sender identity, company notification address, and optional CC/BCC. Settings are stored in `settings`; the password is encrypted and masked in the form. Leave its field empty to retain the current password. Test delivery with the test card; success or the transport's error is recorded in `email_logs`.

Example starting points (confirm the exact values shown in your provider account):

| Provider | Host | Port | Encryption |
| --- | --- | ---: | --- |
| Hostinger Email | `smtp.hostinger.com` | 465 | SSL |
| Google Workspace SMTP relay | `smtp-relay.gmail.com` | 587 | TLS (relay must be configured by the Workspace administrator) |
| Brevo | `smtp-relay.brevo.com` | 587 | TLS |
| Zoho Mail | `smtp.zoho.com` (some paid domain accounts use `smtppro.zoho.com`) | 587 | TLS |

Provider details: [Hostinger configuration](https://www.hostinger.com/support/1575756-how-to-get-email-account-configuration-details-for-hostinger-email/), [Google Workspace SMTP relay](https://support.google.com/a/answer/176600), [Brevo SMTP credentials and server](https://help.brevo.com/hc/en-us/articles/7924908994450-Send-transactional-emails-using-Brevo-SMTP), [Brevo port guidance](https://help.brevo.com/hc/en-us/articles/10905415650322-Which-SMTP-port-should-I-use-Port-587-465-or-2525), and [Zoho SMTP](https://www.zoho.com/mail/help/zoho-smtp.html). Google personal accounts may require an app password or OAuth; Workspace relay requires administrator configuration. Hostinger and providers can vary settings by account and region, so verify in the provider control panel.

The mail runtime reads database settings through `AppServiceProvider`; password recovery, contact notifications and test messages use that configured SMTP transport. For production, set a valid `APP_KEY` before saving credentials and preserve it during backups.
