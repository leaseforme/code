import React from 'react';

function Navbar() {
  return (
    <header className="bg-white shadow-sm sticky top-0 z-50">
      <div className="max-w-7xl mx-auto flex items-center justify-between p-4">
        <a href="/" className="text-xl font-bold text-gray-800">LeaseForMe</a>
        <nav className="space-x-4">
          <a href="/" className="text-gray-600 hover:text-gray-900">Home</a>
          <a href="/listings" className="text-gray-600 hover:text-gray-900">Listings</a>
          <a href="/apply" className="text-gray-600 hover:text-gray-900">Apply</a>
        </nav>
      </div>
    </header>
  );
}

export default Navbar;
