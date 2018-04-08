import {RideRatingResponse} from "../ride-rating/ride-rating-response";

interface RideResponse {
    id: number;
    modal_line_id: number;
    modal_line: ModalLineResponse;
    ride_at: string;
    ride_rating: RideRatingResponse;
}