# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

#Some Demo Image
![image](https://user-images.githubusercontent.com/70734968/169952266-eea1fe92-1fea-46ea-9889-9c1a5c53aaa3.png)
![image](https://user-images.githubusercontent.com/70734968/169952301-5392c10d-f5c8-499f-91be-9d2aacf23855.png)
![image](https://user-images.githubusercontent.com/70734968/169952345-9835289a-5bac-45d6-9b6a-83ed464bef44.png)
![image](https://user-images.githubusercontent.com/70734968/169952335-da73b7c3-6532-4258-aa15-0665864e5331.png)
![image](https://user-images.githubusercontent.com/70734968/169952401-75dfb0de-eaf8-48fb-9443-89916714499b.png)
![image](https://user-images.githubusercontent.com/70734968/169952658-09ca3e62-381f-418b-9253-0686cac2e2a6.png)
![image](https://user-images.githubusercontent.com/70734968/169952679-43b7d413-5c50-48bb-bb30-f946e175e567.png)
![image](https://user-images.githubusercontent.com/70734968/169952688-a6984744-f36a-4185-b0c4-b0a1d165733f.png)
![image](https://user-images.githubusercontent.com/70734968/169952700-0484759c-6124-4d87-9101-2ed7c49b9e7b.png)
![image](https://user-images.githubusercontent.com/70734968/169952711-f0fb3623-ae20-4cb8-9613-b7f7c193be1d.png)
![image](https://user-images.githubusercontent.com/70734968/169952719-1efaf6f2-bfa9-4699-b5f2-747b9ce022b7.png)
![image](https://user-images.githubusercontent.com/70734968/169952733-270bcae8-efb6-4880-a4d7-8bb819b03d1c.png)
![image](https://user-images.githubusercontent.com/70734968/169952745-6935d27c-dda9-4429-a5e6-1b8be859da98.png)
![image](https://user-images.githubusercontent.com/70734968/169952762-3458a6a4-3d2d-4892-8384-25954e340cb7.png)
![image](https://user-images.githubusercontent.com/70734968/169952779-44ac35c3-627f-4428-bd12-5a8c465ef742.png)

