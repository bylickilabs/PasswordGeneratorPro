# 🔐 Security Policy

## Project: **Password Generator Pro**

---

## 🛡️ Supported Versions

| Version               | Supported |
|------------------------|-----------|
| `main` (latest commit) | ✅ Yes     |
| Previous tagged release | ⚠️ On Request |
| Custom forks            | ❌ No      |

---

## 🔒 Reporting a Vulnerability

If you discover a security vulnerability in this project, **please report it responsibly**:

1. **Do NOT open public issues** describing the flaw.
2. Instead, contact the maintainer via:
   - 📧 Email: `bylicki@mail.de`
   - 📥 Secure Form (if available)
3. Provide:
   - A detailed description
   - A proof-of-concept (PoC)
   - Suggested fixes (if applicable)

We take all reports seriously and aim to respond within **48 hours**.

---

## ✅ Disclosure Timeline

Once a vulnerability is confirmed, we aim to:

- Fix it within 7 business days.
- Notify affected users (if applicable).
- Publicly disclose the patch through a release note.

---

## 🔐 Secure Development Practices

This project follows:

- 💼 **Laravel** best practices for secure APIs (CSRF, XSS, SQLi prevention)
- 🧱 **Vue.js** sanitization for DOM binding
- 🔐 Password generation is **100% local**, no third-party API
- 🔒 No passwords are stored in plaintext or transmitted externally
- 🧪 Code is reviewed before each release

---

## 📦 Dependencies

We regularly audit dependencies via:

- `npm audit`
- `composer audit`
- GitHub Dependabot Alerts (if repository is hosted on GitHub)

---

## 🧩 Known Issues

There are **no known security vulnerabilities** as of this publication.  
If you discover something, please follow the reporting procedure above.

---

## 📘 License & Responsibility

While we strive to build secure software, **Password Generator Pro is provided “as is”**.  
The authors are not liable for any misuse or resulting damages.

---

**Last updated:** July 26, 2025  
**Maintainer:** [BYLICKILABS](https://github.com/bylickilabs)
