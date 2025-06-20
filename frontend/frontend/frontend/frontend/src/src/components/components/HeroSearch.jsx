import React, { useState } from 'react';

function HeroSearch() {
  const [tab, setTab] = useState('rent');

  return (
    <section className="relative bg-gray-900 text-white h-96 flex items-center justify-center">
      <img
        src="https://images.unsplash.com/photo-1502673530728-f79b4cab31b1?auto=format&fit=crop&w=1950&q=80"
        alt="Hero background"
        className="absolute inset-0 w-full h-full object-cover opacity-60"
      />
      <div className="relative z-10 text-center w-full px-4">
        <div className="inline-flex bg-white bg-opacity-20 rounded-full p-1 mb-6">
          {['buy', 'rent', 'sell'].map((t) => (
            <button
              key={t}
              onClick={() => setTab(t)}
              className={`px-4 py-2 rounded-full text-sm capitalize transition-all ${
                tab === t ? 'bg-white text-gray-900' : 'text-white'
              }`}
            >
              {t}
            </button>
          ))}
        </div>
        <div className="max-w-xl mx-auto flex bg-white rounded-full overflow-hidden shadow-lg">
          <input
            type="text"
            placeholder="Search by city, ZIP, or address"
            className="flex-grow px-6 py-3 text-gray-800 focus:outline-none"
          />
          <button className="bg-indigo-600 hover:bg-indigo-700 transition-colors px-6 py-3 text-white font-semibold">
            Search
          </button>
        </div>
      </div>
    </section>
  );
}

export default HeroSearch;
