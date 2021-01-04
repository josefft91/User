# User Domain

## How to run

You should have `docker` and `docker-compose` installed. Clone the repository and then run the following commands:

```
docker-compose run composer install
docker-compose run phpunit --testdox tests
```


## About
### User Story

**As a** Marketing Executive at MegaLand\
**I want to** capture Visitor details\
**So that** I can wow our customers with amazing deals/offers/news about our Resort.

**Context:** This imaginary story would be part of a wider epic. The team has decided that it's valuable to split out a wider User Registration piece into smaller components in line with [INVEST](https://www.agilealliance.org/glossary/invest/).

### Acceptance criteria

A Registered User [domain entity](https://enterprisecraftsmanship.com/2016/01/11/entity-vs-value-object-the-ultimate-list-of-differences/) is created with the following **required** properties:
    - First name (max 32 chars)
    - Last name (max 32 chars)
    - Date of birth (min age, 13 years old)
        - It should be possible to get the user's age in years as this'll be displayed in the App's UI.
    - Email address (max 254 chars)
    - Password (max 32 chars)