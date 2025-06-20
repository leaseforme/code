# LeaseForMe Frontend (Modern Redesign)

This folder contains the React + Tailwind CSS codebase for the modern redesign inspired by Compass, Stripe, and Airbnb.

## Tech Stack
- **React 18** (via Vite)
- **Tailwind CSS 3**
- **React Router** for basic routing

## Setup
```bash
# Install dependencies
npm install

# Start dev server
npm run dev

# Build for production
npm run build
```

## Structure
```
frontend/
  src/
    components/
      Navbar.jsx
      HeroSearch.jsx
      PropertyCard.jsx
      ListingGrid.jsx
    App.jsx
    main.jsx
  index.html
  tailwind.config.js
  postcss.config.js
  vite.config.js
  package.json
```

## Components
- **Navbar** – Sticky top navigation with minimal links.
- **HeroSearch** – Full‑width background hero with tabbed search (Buy, Rent, Sell).
- **PropertyCard** – Clean card layout for property listings.
- **ListingGrid** – Responsive grid of `PropertyCard` components.

Feel free to expand components and pages as needed.
