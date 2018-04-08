import {RideResponse} from "../ride/ride-response";

interface RideRatingResponse {
    id: number;
    ride_id: number;
    modal_problem_id: number;
    overall_rating: number;
    observations: string;
    ride: RideResponse;
    modal_problem: ModalProblemResponse;
}