package com.example.travelapp.service;

import com.example.travelapp.model.TourService;
import com.example.travelapp.repository.TourServiceRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Service
public class TourServiceService {
    @Autowired
    TourServiceRepository  tourServiceRepository;
    public List<TourService> getAllTourService(){
        return tourServiceRepository.findAll();
    }
    public List<TourService> getTourServiceByIdTour(Long tour_id){
        return tourServiceRepository.getServiceByIdTour(tour_id);
    }
    public Map<String,Object> save(TourService tourService) {
        Map<String, Object> m = new HashMap<>();
        if (tourServiceRepository.checkExistService(tourService.getTour().getId(),tourService.getService().getId())!=0) {

            m.put("status", "0");
            m.put("message", "da ton tai");
        }
        else{
            m.put("status", "1");
            m.put("message", "thanh cong");
            tourServiceRepository.save(tourService);
        }
        return m;
    }
    public void deleteByTourId(Long id){
            tourServiceRepository.deleteTourServiceByTourId(id);
    }
    public void delete(TourService tourService){
        TourService tourService1=tourServiceRepository.getTourService(tourService.getTour().getId(),tourService.getService().getId());
        tourServiceRepository.delete(tourService1);
    }
    public void deleteAll(Long id_tour){
        List<TourService> a= tourServiceRepository.getListTourService(id_tour);
        for(int i=0;i<a.size();i++){
            tourServiceRepository.delete(a.get(i));
        }
    }
    public Map<String,Object> updateOrSave(TourService tourService)
    {
        Map<String, Object> m = new HashMap<>();
            TourService tourService1 =tourServiceRepository.getTourServiceByTourIdAndServiceId(tourService.getTour().getId(),tourService.getService().getId());
                if(tourService1!=null)
                    tourServiceRepository.deleteById(tourService1.getId());
                tourServiceRepository.save(tourService);
        m.put("status", "1");
        m.put("message", "thanh cong");
        return  m;

    }


}
