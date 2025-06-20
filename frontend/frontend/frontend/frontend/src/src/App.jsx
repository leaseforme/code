import React from 'react';
import Navbar from './components/Navbar';
import HeroSearch from './components/HeroSearch';
import ListingGrid from './components/ListingGrid';

function App() {
  return (
    <>
      <Navbar />
      <HeroSearch />
      <main className="max-w-7xl mx-auto p-4">
        <ListingGrid />
      </main>
    </>
  );
}

export default App;
