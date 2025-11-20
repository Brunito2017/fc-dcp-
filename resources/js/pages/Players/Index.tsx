import { Player } from "@/types/player";
import PlayerCard from "@/components/PlayerCard";
import AppLayout from "@/layouts/app-layout";



interface indexProps {
    players: Player[];
}


export default function index({ players }: indexProps) {

    return (
        <AppLayout>
            <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
                {players.map((player) => (
                    <PlayerCard key={player.externalId} player={player} />
                ))}
            </div>
        </AppLayout>
    );
}


