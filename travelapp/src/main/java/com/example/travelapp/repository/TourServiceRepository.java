package com.example.travelapp.repository;

import com.example.travelapp.model.TourService;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface TourServiceRepository extends JpaRepository<TourService,Long> {
    @Query(value = "Select * from tour_service where tour_id= ?1", nativeQuery = true)
    List<TourService> getServiceByIdTour(Long tour_id);
    @Query(value = "Select count(*) from tour_service where tour_id= ?1 and service_id= ?2", nativeQuery = true)
    int checkExistService(Long tour_id,Long service_id);
    @Query(value = "Select * from tour_service where tour_id= ?1 and service_id= ?2", nativeQuery = true)
    TourService getTourServiceByTourIdAndServiceId(Long tour_id,Long service_id);
    @Query(value = "Delete * from tour_service where tour_id= ?1", nativeQuery = true)
    int deleteTourServiceByTourId(Long tour_id);
    @Query(value = "Insert into tour_service(tour_id,service_id) values(?1 , ?2)", nativeQuery = true)
    void UpdateOrSave(Long tour_id,Long service_id);
    @Query(value = "Select * from tour_service where tour_id= ?1 and service_id = ?2", nativeQuery = true)
    TourService getTourService(Long tour_id,Long service_id);
    @Query(value = "Select * from tour_service where tour_id= ?1", nativeQuery = true)
    List<TourService> getListTourService(Long tour_id);
}
