import React from "react";
import { Player } from "@/types/player";

interface PlayerCardProps {
  player: Player;
}

const PlayerCard: React.FC<PlayerCardProps> = ({ player }) => {
  return (
    <div className="bg-white shadow-md rounded-lg p-4 flex flex-col items-center text-center transition-transform transform hover:-translate-y-1 hover:shadow-lg">
      <h2 className="text-xl font-bold text-gray-800">{player.name}</h2>
      <p className="text-sm text-gray-600">Position: {player.position}</p>
      <p className="text-sm text-gray-600">Club: {player.club}</p>
      <p className="text-sm text-gray-600">Nation: {player.nation}</p>
      <p className="text-lg font-semibold text-green-600">Rating: {player.rating}</p>
    </div>
  );
};

export default PlayerCard;