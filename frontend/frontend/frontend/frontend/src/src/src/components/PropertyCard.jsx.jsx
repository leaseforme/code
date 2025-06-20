import React from 'react';

function PropertyCard({ property }) {
  return (
    <div className="bg-white rounded-lg shadow hover:shadow-lg transition p-4">
      <img
        src={property.image}
        alt={property.address}
        className="w-full h-48 object-cover rounded-md mb-4"
      />
      <h3 className="text-lg font-semibold mb-1">{property.price}</h3>
      <p className="text-gray-600 mb-2">{property.address}</p>
      <p className="text-gray-500 text-sm">
        {property.beds} bd • {property.baths} ba • {property.sqft} sqft
      </p>
    </div>
  );
}

export default PropertyCard;
