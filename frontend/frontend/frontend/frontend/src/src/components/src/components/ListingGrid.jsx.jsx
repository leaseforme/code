import React from 'react';
import PropertyCard from './PropertyCard';

const mockData = [
  {
    image: 'https://images.unsplash.com/photo-1560185127-6a8c7f6a0c8f?auto=format&fit=crop&w=800&q=80',
    address: '123 Main St, Los Angeles, CA',
    price: '$2,500/mo',
    beds: 2,
    baths: 2,
    sqft: 1200,
  },
  {
    image: 'https://images.unsplash.com/photo-1598928506311-c55dedf4a3b0?auto=format&fit=crop&w=800&q=80',
    address: '456 Elm St, San Francisco, CA',
    price: '$3,200/mo',
    beds: 3,
    baths: 2,
    sqft: 1500,
  },
  // Add more mock listings as needed
];

function ListingGrid() {
  return (
    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      {mockData.map((property, idx) => (
        <PropertyCard key={idx} property={property} />
      ))}
    </div>
  );
}

export default ListingGrid;
