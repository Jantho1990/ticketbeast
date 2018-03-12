# What should we build first?

- ~~Inviting promoters~~
    - Don't need to send invites if we can just call them
- ~~Creating accounts~~
    - Don't need to create accounts when promoters can't do anything in the system (yet)
- ~~Logging in as a promoter~~
    - They don't need access if we are handling all the info ourselves
- ~~Adding concerts~~
    - Promoter could send us email with new concert info and we could enter it in DB manually
- ~~Editing concerts~~
    - Promoter could send us email with updated info and we could enter it in DB manually
- ~~Publishing concerts~~
    - A promoter could tell us when they want the concert to go live and one of our
    developers could flick a switch in the DB at the right time
- ~~Integrating with Stripe Connect to do direct payouts~~
    - We could handle this manually by putting all payments directly into our account
    and having an employee reconcile what is owed to promoters ~once/week
- Purchasing tickets
    - Yeah, we need this
    
## What should we test first?

- Purchasing Tickets
    - View the concert listing
        + Allowing people to view published concerts
        + Not allowing people to view unpublished concerts
    - Pay for the tickets
    - View their purchased tickets in the browser
    - Send an email confirmation